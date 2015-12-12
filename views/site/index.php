<?php

/* @var $this yii\web\View */

$this->title = 'IGreekU';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>
<div class="site-index">

    <div>
        <h1 data-sr="move 16px scale up 20%, over 1s">Welcome to IGreekU!</h1>

        <p class="lead" data-sr="move 16px scale up 20%, over 1s">IGreekU is aiming to become a social media company focused on members of fraternities and sororities.</p>
    </div>


    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner index-silider" role="listbox">
          <div class="item active">
              <img src="/images/igreeku-1.jpg">      
              <div class="carousel-caption">IGreekU 1</div>
          </div>
          <div class="item">
              <img src="/images/igreeku-bg.png">      
              <div class="carousel-caption">IGreekU 2</div>
          </div>
          <div class="item">
              <img src="/images/slide1.jpg">      
              <div class="carousel-caption">IGreekU 3</div>
          </div>
      </div>

      <!-- Controls -->      
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
      </div>


      <div class="col-md-12">
        <div class="m-r-3 clearfix" style="margin-top:50px;">
            <div class="m-r-3-h5" data-sr="enter left, hustle 200px">
                <h2 class="text-center"><i class="fa fa-home"></i></h2>
                <h3 class="text-center">About Us</h3>
                <div class="text-center"><span class="break"></span></div>
            </div>
        </div>

        <div class="m-r-3-abs" data-sr="wait 0.2s, scale up 20%">
            <div class="well">
                The moment you visit IGreekU Website everything feels different. Our 50000 social networks are providing for beautiful, unforgettable surroundings. But it's more than that - it's our dedication to each and every student's personal growth that makes our environment so unique.
                <br><br>
                We've been graduating adept, accomplished students since being founded in 1832 in Hamilton College, Clinton, NY. We're committed to fostering a strong sense of community, where the learning goes deeper, the friendships are more intense, and the experiences stay with you long after graduation. Our 50,000 sororities and faternities students will become your friends and support system, and our chapters posts, news feeds and job posts will give you the opportunity to turn your interests into passions and careers.

            </div>
        </div>
      </div>


    <div class="col-md-12 clearfix" style="margin-top:50px;">
        <div data-sr="enter left, hustle 200px" class="col-lg-4">
            <h2><span class="label label-primary">Providing</span></h2>

            <br>

            <p  >We are providing these organizations with a solution that addresses their communication and structural needs in a digital space.</p>
        </div>
        <div  data-sr="enter top, hustle 200px" class="col-lg-4">
            <h2><span class="label label-success">Connecting</span></h2>

            <br>

            <p >We will be connecting the local and national parts of the organizations together, including alumni. Each local chapter will be able to share content amongst themselves and connect within the national organization as well.</p>
        </div>
        <div  data-sr="enter right, hustle 200px" class="col-lg-4">
            <h2><span class="label label-info">Organization</span></h2>

            <br>

            <p>We will also be connecting current members with alumni of each organization, whether for advice, jobs, or just to chat and share stories.</p>
        </div>
    </div>


    <div class="col-md-12 clearfix" style="margin-top:40px;" data-sr="enter bottom, hustle 200px">
        <h2 class="text-center">
            Find Us
        </h2>
        <br>

        <div id="map-canvas" style="height:400px;"></div>
        <div id="save-widget" style="background-color: #fff;border: 1px solid #ccc;padding: 20px;opacity: 0.7;">
           <strong>6126 Lincolhn Avenue Morton Grove, IL 60053</strong>
        </div>
    </div>

    <div class="clearfix" ></div>

    <div class="col-md-offset-2 col-md-8" style="margin-top:50px;" data-sr="enter top, hustle 200px">
        <h2 class="text-center">
            Contact Us
        </h2>

        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name') ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'subject') ?>

            <?= $form->field($model, 'comment')->textArea(['rows' => 6]) ?>

            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

<script>
    window.sr = new scrollReveal();
</script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
<script>
    function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var myLatLng = new google.maps.LatLng(42.0354818, -87.7823812);
        var mapOptions = {
            center: myLatLng,
            zoom: 10,
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({
            map: map,
            // Define the place with a location, and a query string.
            place: {
                location: myLatLng,
                query: 'Google, Fairfield, Connecticut, USA'
            },
        });
        // Create a new SaveWidgetOptions object for Google Sydney.
        var saveWidgetOptions = {
            place: {
                placeId: 'ChIJC7zHsmShwokRbrc0nIuGQ4c',
                location: myLatLng
            },
            attribution: {
                source: 'Google Maps JavaScript API',
                webUrl: 'https://developers.google.com/maps/'
            }
        };
        var widgetDiv = document.getElementById('save-widget');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(widgetDiv);
        // Append a Save Control to the existing save-widget div.
        saveWidget = new google.maps.SaveWidget(widgetDiv, saveWidgetOptions);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>