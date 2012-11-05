<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "home")) ?>
<?php end_slot() ?>

<div class="landing-row">
    <div class="landing-left-column">
        <div class="landing-image"></div>
    </div>
    <div class="landing-right-column">
        <div class="column-row">
            <input class="button landing-button" value="Enroll as a student!" type="button" onclick="document.location.href='/backend.php/student/enroll/new';"/>
        </div>
        <div class="column-row">
            <input class="button landing-button" value="Enroll as an instructor!" type="button" onclick="document.location.href='/backend.php/student/enroll/new';"/>
        </div>
    </div>
</div>
<div class="landing-row">
    <div class="landing-left-column">
        <div class="column-row">
            <p class="welcome-message">
                <span>Welcome to TutorPlus</span> - a novel learning platform where UNISA learners <span>collaborate</span> within their module/course activities with the support of our specially trained instructors and tutors. It's surely an enhanced free learning platform which is specifically designed to compliment your distant educational needs. <span>Get better results with us!!!</span>
            </p>
        </div>
        <div class="column-row">
            <div class="instructor-testimonial">
                <a class="photo-link" style="width:96px;height:96px;" href="/backend.php/profile/john-kennedy"><img src="/uploads/users/9/normal-96.jpg " class="image" alt="John Kennedy" title="John Kennedy"></a>
                <div class="text">
                    <h3 class="name">David Austin</h3>
                    <h5 class="institution">University of Pretoria</h5>
                    <p class="says">We were very happy with TutorPlus in our first online course so I'd give it a strong positive recommendation</p>
                </div>
            </div>
            <div class="instructor-testimonial">
               <a class="photo-link" style="width:96px;height:96px;" href="/backend.php/profile/john-kennedy"><img src="/uploads/users/8/normal-96.jpg " class="image" alt="John Kennedy" title="John Kennedy"></a>
                <div class="text">
                    <h3 class="name">Brian Harvey</h3>
                    <h5 class="institution">NMMU</h5>
                    <p class="says">We were very happy with TutorPlus in our first online course so I'd give it a strong positive recommendation</p>
                </div>
            </div>
        </div>
    </div>
    <div class="landing-right-column">
        <div class="column-row">
            <div class="instructor-testimonial">
                <a class="photo-link" style="width:96px;height:96px;" href="/backend.php/profile/john-kennedy"><img src="/uploads/users/8/normal-96.jpg " class="image" alt="John Kennedy" title="John Kennedy"></a>
                <div class="text">
                    <h3 class="name">Johh Searle</h3>
                    <h5 class="institution">University of Cape Town</h5>
                    <p class="says">We were very happy with TutorPlus in our first online course so I'd give it a strong positive recommendation</p>
                </div>
            </div>
        </div>
        <div class="column-row">
            <div class="instructor-testimonial">
                <a class="photo-link" style="width:96px;height:96px;" href="/backend.php/profile/john-kennedy"><img src="/uploads/users/8/normal-96.jpg " class="image" alt="John Kennedy" title="John Kennedy"></a>
                <div class="text">
                    <h3 class="name">Batanayi Matuku</h3>
                    <h5 class="institution">Rhodes University</h5>
                    <p class="says">We were very happy with TutorPlus in our first online course so I'd give it a strong positive recommendation</p>
                </div>
            </div>
        </div>
    </div>
</div>