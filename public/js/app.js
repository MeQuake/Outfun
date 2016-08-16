$(document).ready(function(){

    if($('form').hasClass('dropzone'))
    {
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone", {
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 4,
            parallelUploads: 4,
            //addRemoveLinks: true,
            previewsContainer: ".slider",
            clickable: ".fileinput-button",
            init: function() {
                this.on("addedfile", function(file) {
                    $('.slider').slick('slickAdd',file.previewElement);;
                });

                document.querySelector("span.addPost").addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
            }
        });
    }

    $('.slider').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        variableWidth: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    $('.photo-preview').slick({
        dots: true,
        infinite: true,
        arrows: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });

    $.ajaxSetup(
    {
        headers:
        {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('a.thumb-up-button').click(function(e) {
        var task_id = $(this).attr('value');
        console.log("clicked thumb up button");
        sendRequest("post", "like", task_id);
        //Prevent default action (scrooling to specified element for example)
        e.preventDefault();
    });

    function sendRequest(action, subaction, id) {
        $.ajax({
            type: "POST",
            dataType : 'json',
            url: "/" + action + "/" + id + "/" + subaction,
            success: function (data) {
                console.log(data);
                alert(data['message']);
            },
            error: function (data) {
                console.log('Error:', data);
                alert("something went wrong");
            }
        });
    }
});
