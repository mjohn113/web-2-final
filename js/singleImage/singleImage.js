function addReview(uid, id, userType) {
    if ($("#reviewDescription").val() === "" || $("#ratingValue").val() === "0") {
        $('#checkForm').removeClass('d-none');
        $('#checkMessage').empty().append('Please enter all fields.');
    }
    else {
        $.ajax({
            url: "php/singleImage/reviews.php",
            type: "POST",
            data: {
                UID: uid,
                imageId: id,
                review: $("#reviewDescription").val(),
                rating: $("#ratingValue").val(),
            },
            success: function (data) {
                let response = JSON.parse(data);
                if (response.status === 'error') {
                    $('#checkForm').removeClass('d-none');
                    $('#checkMessage').empty().append(response.message);
                } else {
                    $('#exampleModal').modal('hide');
                    fetchReviews(id, uid, userType);
                }
            },
            error: function (data) {
                alert(data);
            }
        });

    }

}

function highlightStar($this) {
    $('#rating').children('i').each(function () {
        $("#"+this.id).removeClass("fas");
    });
    switch($this.id) {
        case "fiveStar":
            $("#fiveStar").addClass("fas");
            $("#fourStar").addClass("fas");
            $("#threeStar").addClass("fas");
            $("#twoStar").addClass("fas");
            $("#oneStar").addClass("fas");
            $("#ratingValue").val("5");
            break;
        case "fourStar":
            $("#fourStar").addClass("fas");
            $("#threeStar").addClass("fas");
            $("#twoStar").addClass("fas");
            $("#oneStar").addClass("fas");
            $("#ratingValue").val("4");
            break;
        case "threeStar":
            $("#threeStar").addClass("fas");
            $("#twoStar").addClass("fas");
            $("#oneStar").addClass("fas");
            $("#ratingValue").val("3");
            break;
        case "twoStar":
            $("#twoStar").addClass("fas");
            $("#oneStar").addClass("fas");
            $("#ratingValue").val("2");
            break;
        case "oneStar":
            $("#oneStar").addClass("fas");
            $("#ratingValue").val("1");
            break;
    }
}

function deleteReview(reviewId, uid, userType, imageId) {
    $.ajax({
        url: "php/singleImage/reviews.php" + '?' + $.param({
            "UID": uid,
            "reviewId" : reviewId,
            "userType" : userType,
            "delete" : 1
        }),
        type: "GET",
        success: function (data) {
            let response = JSON.parse(data);
            if (response.status === 'error') {
                alert(response.message);
            } else {
                alert(response.message);
                fetchReviews(imageId, uid, userType);
            }
        },
        error: function (data) {
            alert(data["responseText"]);
        }
    });

}

function fetchReviews(id, uid, userType) {
    $.ajax({
        url: "php/singleImage/reviews.php" + '?' + $.param({
            "id": id,
        }),
        type: "GET",
        success: function (data) {
            var obj = JSON.parse(data);
            $('#reviewSection').empty()
            if (obj.status === 0) {
                $('#reviewSection').append('<div class="col-12"><h6 class="mb-1">There was a problem fetching reviews. Please try again later.</h6>');
            } else {
                if (typeof uid === 'undefined')
                    $('#reviewSection').append('<div class="col-12"><a href="userlogin.php" class="btn btn-primary">Login to Review</a></div>');
                else {
                    var found = obj.data.find(function(element) {
                        return element['UID'] == uid;
                    });
                    if (found) {
                        $('#reviewSection').append('<div class="col-12"><button type="button" class="btn btn-primary disabled" disabled>Already Reviewed</button></div>');
                    }
                    else {
                        $('#reviewSection').append('<div class="col-12"><button type="button" id="postReviewButton" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Post Review</button></div>');
                    }
                }
                $.each(obj.data, function (i) {
                    $('#reviewSection').append(
                        '<div class="col-12"><h6 class="mt-3 mb-1"><a href="singleUser.php?id=' + obj.data[i]['UID'] + '">' + obj.data[i]['FirstName'] + ' ' + obj.data[i]['LastName'] + '</a></h6></div>',
                        '<div class="col-12 mb-1">' + getStars(obj.data[i]['Rating']) + '</div>',
                        '<div class="col-12 mb-1">' + obj.data[i]['Review'] + '</div>'
                    );
                    if (userType === 2) {
                        $('#reviewSection').append('<div class="col-12"><button type="button" onclick="deleteReview(' + obj.data[i]['ImageRatingID'] + ', ' + uid + ', ' + userType + ', ' + id + ')" class="btn btn-primary mt-1">Delete</button>');
                    }
                });
            }
        },
        error: function (data) {
            alert(data);
        }
    });
}

// Source: https://codereview.stackexchange.com/a/178069
function getStars(rating) {

    // Round to nearest half
    rating = Math.round(rating * 2) / 2;
    let output = [];

    // Append all the filled whole stars
    for (var i = rating; i >= 1; i--)
        output.push('<i class="fas fa-star text-primary"></i>');

    // Fill the empty stars
    for (let i = (5 - rating); i >= 1; i--)
        output.push('<i class="far fa-star text-primary"></i>');

    return output.join('');

}