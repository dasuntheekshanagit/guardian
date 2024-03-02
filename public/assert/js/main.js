$(function(){
	$("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        transitionEffectSpeed: 300,
        labels: {
            next: "Continue",
            previous: "Back",
            finish: 'Submit'
        },
        onStepChanging: function (event, currentIndex, newIndex) { 
            if ( newIndex >= 1 ) {
                $('.steps ul li:first-child a img').attr('src','/img/precipcard/step-1.png');
            } else {
                $('.steps ul li:first-child a img').attr('src','/img/precipcard/step-1-active.png');
            }

            if ( newIndex === 1 ) {
                $('.steps ul li:nth-child(2) a img').attr('src','/img/precipcard/step-2-active.png');
            } else {
                $('.steps ul li:nth-child(2) a img').attr('src','/img/precipcard/step-2.png');
            }

            if ( newIndex === 2 ) {
                $('.steps ul li:nth-child(3) a img').attr('src','/img/precipcard/step-3-active.png');
            } else {
                $('.steps ul li:nth-child(3) a img').attr('src','/img/precipcard/step-3.png');
            }

            if ( newIndex === 3 ) {
                $('.steps ul li:nth-child(4) a img').attr('src','/img/precipcard/step-4-active.png');
                $('.actions ul').addClass('step-4');
                document.getElementById('confirmation-contact').textContent = document.querySelector('input[name="contactno"]').value;
                document.getElementById('confirmation-address').textContent = document.querySelector('input[name="address"]').value;
                document.getElementById('confirmation-note').textContent = document.querySelector('textarea[name="note"]').value;
            } else {
                $('.steps ul li:nth-child(4) a img').attr('src','/img/precipcard/step-4.png');
                $('.actions ul').removeClass('step-4');
            }
            return true; 
        },
        onFinished: function (event, currentIndex) {
            // $('#hidden-submit').click();
            $('#wizard').submit();
        }
    });
    // Custom Button Jquery Steps
    $('.forward').click(function(){
    	$("#wizard").steps('next');
    })
    $('.backward').click(function(){
        $("#wizard").steps('previous');
    })
    // Create Steps Image
    $('.steps ul li:first-child').append('<img src="/img/precipcard/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="/img/precipcard/step-1-active.png" alt=""> ').append('<span class="step-order">Step 01</span>');
    $('.steps ul li:nth-child(2').append('<img src="/img/precipcard/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="/img/precipcard/step-2.png" alt="">').append('<span class="step-order">Step 02</span>');
    $('.steps ul li:nth-child(3)').append('<img src="/img/precipcard/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="/img/precipcard/step-3.png" alt="">').append('<span class="step-order">Step 03</span>');
    $('.steps ul li:last-child a').append('<img src="/img/precipcard/step-4.png" alt="">').append('<span class="step-order">Step 04</span>');
    // Count input 
    $(".quantity span").on("click", function() {

        var $button = $(this);
        var oldValue = $button.parent().find("input").val();

        if ($button.hasClass('plus')) {
          var newVal = parseFloat(oldValue) + 1;
        } else {
           // Don't allow decrementing below zero
          if (oldValue > 0) {
            var newVal = parseFloat(oldValue) - 1;
            } else {
            newVal = 0;
          }
        }
        $button.parent().find("input").val(newVal);
    });
    // Form submission
    $('#wizard').on('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content')); 

        fetch('/add', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            window.location.href = 'http://127.0.0.1:8000';
            }
        )
        .catch(error => console.error(error));
    });
})
