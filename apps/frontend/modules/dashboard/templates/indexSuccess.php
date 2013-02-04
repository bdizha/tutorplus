<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<div id="sf_admin_content" class="dashboard">
    <div class="column-one">
        <?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 128)) ?>
        <div class="row">
            <?php echo link_to('New Messages', 'message_inbox') ?> <span class="list-count"><?php echo $totalInboxCount ?></span>
        </div>
        <div class="row">
            <?php echo link_to('Events', 'calendar_event') ?> <span class="list-count"><?php echo $totalInboxCount ?></span>
        </div>
        <div class="row">
            <div class="underlined"><h5>Suggestions</h5></div>
            <div id="dashboard_suggested_peers" class="dashboard_peers">
                <?php include_partial('suggestions', array("peers" => $suggestedPeers, "profile" => $profile)) ?>
            </div>
        </div>
        <div class="row">
            <div class="underlined"><h5>My Peers <span class="list-count"><?php echo $peers->count() ?></span></h5></div>
            <div id="dashboard_my_peers" class="dashboard_peers">
                <?php include_partial('peers', array("peers" => $peers, "profile" => $profile)) ?>
            </div>
        </div>
    </div>
    <div class="column-two">
        <div class="row">
            <h2>Welcome, <?php echo $profile->getTitle() . " " . $profile->getName() ?>!</h2>
        </div>
        <div class="row">
            <h4>Activity Feeds</h4>
            <div id="dashboard-feeds">
                <div class="timeline-row">
                    <div class="heading">
                        <a class="photo-link" style="width:24px;height:24px;" href="/lufuno-sadiki"><img src="/profile/show/photo/10/24/1359821562" class="image" alt="Lufuno Sadiki" title="Lufuno Sadiki"></a>
                        has sent you a message <a href="/my/course/fundamentals-of-online-education-planning-and-application">Fundamentals of Online Education: Planning and Application ~ (FOEPA)</a>    </div>
                    <div class="body">
                        <div class="user-meta">
                            Sent by <a href="/lufuno-sadiki">Lufuno Sadiki</a> - <span class="datetime">1 day ago</span>
                        </div>
                    </div>
                </div>
                <div class="timeline-row">
                    <div class="heading">
                        <a class="photo-link" style="width:24px;height:24px;" href="/lufuno-sadiki"><img src="/profile/show/photo/10/24/1359821562" class="image" alt="Lufuno Sadiki" title="Lufuno Sadiki"></a>
                        has requested you as a peer <a href="/my/course/fundamentals-of-online-education-planning-and-application">here</a>    </div>
                    <div class="body">
                        <div class="user-meta">
                            Request by <a href="/lufuno-sadiki">Lufuno Sadiki</a> - <span class="datetime">1 day ago</span>
                        </div>
                    </div>
                </div>
                <div class="timeline-row">
                    <div class="heading">
                        <a class="photo-link" style="width:24px;height:24px;" href="/lufuno-sadiki"><img src="/profile/show/photo/10/24/1359821562" class="image" alt="Lufuno Sadiki" title="Lufuno Sadiki"></a>
                        has enrolled into course: <a href="/my/course/fundamentals-of-online-education-planning-and-application">here</a>    </div>
                    <div class="body">
                        <div class="user-meta">
                            Enrollment by <a href="/lufuno-sadiki">Lufuno Sadiki</a> - <span class="datetime">1 day ago</span>
                        </div>
                    </div>
                </div>
                <div class="timeline-row">
                    <div class="heading">
                        <a class="photo-link" style="width:24px;height:24px;" href="/lufuno-sadiki"><img src="/profile/show/photo/10/24/1359821562" class="image" alt="Lufuno Sadiki" title="Lufuno Sadiki"></a>
                        has created a new discussion group: <a href="/my/course/fundamentals-of-online-education-planning-and-application">here</a>    </div>
                    <div class="body">
                        <div class="user-meta">
                            Created by <a href="/lufuno-sadiki">Lufuno Sadiki</a> - <span class="datetime">1 day ago</span>
                        </div>
                    </div>
                </div>
                <div class="timeline-row">
                    <div class="heading">
                        <a class="photo-link" style="width:24px;height:24px;" href="/lufuno-sadiki"><img src="/profile/show/photo/10/24/1359821562" class="image" alt="Lufuno Sadiki" title="Lufuno Sadiki"></a>
                        has started a discussion topic: <a href="/my/course/fundamentals-of-online-education-planning-and-application">here</a>    </div>
                    <div class="body">
                        <div class="user-meta">
                            Created by <a href="/lufuno-sadiki">Lufuno Sadiki</a> - <span class="datetime">1 day ago</span>
                        </div>
                    </div>
                </div>
                <div class="timeline-row">
                    <div class="heading">
                        <a class="photo-link" style="width:24px;height:24px;" href="/lufuno-sadiki"><img src="/profile/show/photo/10/24/1359821562" class="image" alt="Lufuno Sadiki" title="Lufuno Sadiki"></a>
                        has submitted a discussion post: <a href="/my/course/fundamentals-of-online-education-planning-and-application">here</a>    </div>
                    <div class="body">
                        <div class="user-meta">
                            Submitted by <a href="/lufuno-sadiki">Lufuno Sadiki</a> - <span class="datetime">1 day ago</span>
                        </div>
                    </div>
                </div>
                <div class="timeline-row">
                    <div class="heading">
                        <a class="photo-link" style="width:24px;height:24px;" href="/lufuno-sadiki"><img src="/profile/show/photo/10/24/1359821562" class="image" alt="Lufuno Sadiki" title="Lufuno Sadiki"></a>
                        has posted a discussion comment: <a href="/my/course/fundamentals-of-online-education-planning-and-application">here</a>    </div>
                    <div class="body">
                        <div class="user-meta">
                            Posted by <a href="/lufuno-sadiki">Lufuno Sadiki</a> - <span class="datetime">1 day ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h4>My Courses</h4>
            <div id="dashboard-courses">
                <?php include_partial('courses', array("courses" => $courses, "profile" => $profile)) ?>
            </div>
        </div>
        <div class="row">
            <h4>My Groups</h4>
            <div id="dashboad_news_items">
                <?php include_partial('discussion_groups', array("discussionGroups" => $discussionGroups)) ?>
            </div>
        </div>
    </div>
    <div class="column-three">
        <div class="row">
            <h4>News Updates</h4>
            <div id="dashboad_news_items">
                <?php include_partial('news_items', array("newsItems" => $newsItems)) ?>
            </div>
        </div>
        <div class="row">
            <h4>Announcements</h4>
            <div id="dashboard_announcements">
                <?php include_partial('announcements', array("announcements" => $announcements)) ?>
            </div>
        </div>
    </div>
</div>