<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array()) ?>
<?php end_slot() ?>

<div class="landing-row">
    <div class="landing-left-column">
        <div class="landing-image"></div>
    </div>
    <div class="landing-right-column">
        <div class="column-row">
            <input class="button landing-button" value="Explore courses" type="button" onclick="document.location.href='/backend.php/courses';"/>
        </div>
        <div class="column-row">
            <input class="button landing-button" value="Inquire from us" type="button" onclick="document.location.href='/backend.php/inquire';"/>
        </div>
    </div>
</div>
<div class="landing-row">
    <div class="landing-left-column">
        <div class="column-row">
            <p class="welcome-message">
                <span>Welcome to TutorPlus</span> - a novel platform where Higher Education learners <span>collaborate</span> within their course activities with the support of their instructors and peers. It's surely an enhanced learning free platform specifically designed to compliment your educational needs...
            </p>
        </div>
        <div class="column-row">
            <div class="instructor-testimonial">
                <div class="image">
                    <img height="96px" width="96px" src="/avatars/96.png" alt="Batanayi Matuku" />
                </div>
                <div class="text">
                    <h3 class="name">David Austin</h3>
                    <h5 class="institution">University of Pretoria</h5>
                    <p class="says">We were very happy with Piazza in CS 142 so I'd give it a strong positive recommendation. It's easy-to-use, the students really enjoyed it</p>
                </div>
            </div>
            <div class="instructor-testimonial">
                <div class="image">
                    <img height="96px" width="96px" src="/avatars/96.png" alt="Batanayi Matuku" />
                </div>
                <div class="text">
                    <h3 class="name">Brian Harvey</h3>
                    <h5 class="institution">Nelson Mandela University</h5>
                    <p class="says">We were very happy with Piazza in CS 142 so I'd give it a strong positive recommendation. It's easy-to-use, the students really enjoyed it</p>
                </div>
            </div>
        </div>
    </div>
    <div class="landing-right-column">
        <div class="column-row">
            <div class="instructor-testimonial">
                <div class="image">
                    <img height="96px" width="96px" src="/avatars/96.png" alt="Batanayi Matuku" />
                </div>
                <div class="text">
                    <h3 class="name">Johh Searle</h3>
                    <h5 class="institution">University of Cape Town</h5>
                    <p class="says">We were very happy with Piazza in CS 142 so I'd give it a strong positive recommendation. It's easy-to-use, the students really enjoyed it</p>
                </div>
            </div>
        </div>
        <div class="column-row">
            <div class="instructor-testimonial">
                <div class="image">
                    <img height="96px" width="96px" src="/avatars/96.png" alt="Batanayi Matuku" />
                </div>
                <div class="text">
                    <h3 class="name">Batanayi Matuku</h3>
                    <h5 class="institution">Rhodes University</h5>
                    <p class="says">We were very happy with Piazza in CS 142 so I'd give it a strong positive recommendation. It's easy-to-use, the students really enjoyed it</p>
                </div>
            </div>
        </div>
    </div>
</div>