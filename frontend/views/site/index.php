<?php
/* @var $this yii\web\View */
$this->title = 'Welcome to Scintin';
?>

<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <section class="dash-tile bg-success">
            <div class="tile-title">
                                        <span class="pull-right">
                                            <i class="ti-arrow-circle-up mr5"></i>8%
                                        </span>
                <span>STATUS / AGGREGATE</span>
            </div>
            <div class="tile-stats">
                <b>81%</b>
            </div>
            <div class="progress progress-xs mt5 mb10">
                <div class="progress-bar progress-bar-white done" role="progressbar" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100" style="width: 81%">
                </div>
            </div>
            <div class="tile-footer">
                Based on the most recent exam
            </div>
        </section>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <section class="dash-tile bg-success">
            <div class="tile-title">ATTENDANCE</div>
            <div class="tile-stats"><b>78%</b>
            </div>
            <div class="mb20"></div>
            <div class="tile-chart tile-line" style="padding: 0px;"><canvas class="flot-base" width="480" height="80" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 240px; height: 40px;"></canvas><canvas class="flot-overlay" width="480" height="80" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 240px; height: 40px;"></canvas></div>
            <div class="tile-footer">
                Attended 238 out of 300 classes
            </div>
        </section>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <section class="dash-tile bg-danger">
            <div class="tile-title">ACTIVE ASSIGNMENTS</div>
            <div class="tile-stats"><b>3</b>
            </div>
            <div class="tile-bottom">
                <small>Submitted: 1 / Pending: 2 / <b>Ending soon: 2</b></small>
            </div>
            <div class="tile-footer">
                <a href="#">View more details</a>
            </div>
            <div class="tile-icon">
                <i class="ti-timer"></i>
            </div>
        </section>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <section class="dash-tile bg-info">
            <div class="tile-title">
                <a href="javascript:;" class="widget-refresh"><i class="ti-reload pull-right"></i></a>
                <span>Mailbox updates</span>
            </div>
            <div class="tile-stats"><b>4 Unread</b>
            </div>
            <div class="tile-bottom">
                1 Urgent mail / 2 Replies
            </div>
            <div class="tile-footer">
                <a href="#">Goto Mailbox</a>
            </div>
        </section>
    </div>
</div>

<div class="row">
<div class="col-md-4">
    <!-- profile information sidebar -->

    <div class="panel overflow-hidden no-b profile p15">



        <div class="row mb25">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <h4 class="mb0">Harry <b>Potter</b></h4>
                        <small>hpotter@scintin.com</small>

                        <h6 class="mt15 mb15">Class 7</h6>
                        <ul class="user-meta">
                            <li>
                                <i class="ti-home mr5"></i>
                                <span>Surrey, England</span>
                            </li>
                            <li>
                                <i class="ti-book mr5"></i>
                                <a href="javascript:;">Hogwarts School</a>
                            </li>
                            <li>
                                <i class="ti-settings mr5"></i>
                                <a href="javascript:;">Edit Profile</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 text-center">
                        <figure>
                            <img src="img/faceless.jpg" alt="" class="avatar avatar-lg img-circle avatar-bordered">
                            <div class="small mt10">Account Usage</div>
                            <div class="progress progress-xs mt5 mb5">
                                <div class="progress-bar done" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                </div>
                            </div>
                            <small>234 / 879</small>
                        </figure>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 mt25 text-center bt">
                <div class="col-xs-12 col-sm-4">
                    <h2 class="mb0"><b>23</b></h2>
                    <small>Connections</small>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <h2 class="mb0"><b>0</b></h2>
                    <small>Admirers</small>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <h2 class="mb0"><b>67</b></h2>
                    <small>Posts</small>
                </div>
            </div>
        </div>




        <div class="row mb15">
            <div class="col-xs-12">
                <h6 class="heading-font">About <b>Harry</b></h6>
                <p>Harry is merely the unassuming, fictional, wizard-in-training, main character in five novels, which have been widely touted as the best fantasy literature produced since C.S. Lewis and J.R.R. Tolkien.</p>
            </div>

            <div class="col-xs-12 mt15">
                <h6 class="heading-font">Social Profiles</h6>
                <div class="mt10 mb10">
                    <a class="btn btn-social btn-xs btn-facebook mr5"><i class="fa fa-facebook"></i>Facebook </a>
                </div>
            </div>
        </div>
    </div>

    <!-- /profile information sidebar -->
</div>
<div class="col-md-4 mb25">

    <section class="panel bordered">
        <form>
            <textarea placeholder="What's on your mind" rows="2" class="form-control no-b"></textarea>
        </form>

        <div class="panel-footer clearfix no-b">
            <div class="pull-left">
                <button class="btn bg-none btn-sm" type="button">
                    <i class="ti-camera"></i>
                </button>
                <button class="btn bg-none btn-sm" type="button">
                    <i class="ti-video-camera"></i>
                </button>
                <button class="btn bg-none btn-sm" type="button">
                    <i class="ti-time"></i>
                </button>
            </div>
            <div class="pull-right">
                <button class="btn btn-danger btn-sm">&nbsp;&nbsp;&nbsp;Post&nbsp;&nbsp;&nbsp;</button>
            </div>
        </div>
    </section>






    <section class="panel bordered  post-comments">


        <div class="media p15">
            <a class="pull-left" href="javascript:;">
                <img class="media-object avatar avatar-sm" src="img/faceless.jpg" alt="">
            </a>
            <div class="comment">
                <div class="comment-author h6 no-m">
                    <a href="javascript:;"><b>Jane Doe</b></a>
                </div>
                <div class="comment-meta small">MAY 2015, 19:20</div>
                <p>
                    End of summer. I am not sure which course should I take. Harry, your advice would be very helpful for me.
                </p>
                <p class="small">
                    <a href="javascript:;" class="text-muted mr10"><i class="ti-comment mr5"></i>Comment</a>
                    <a href="javascript:;" class="text-muted mr10"><i class="ti-share mr5"></i>Share</a>
                    <a href="javascript:;" class="mr10 text-danger"><i class="ti-heart mr5"></i>Like</a>
                    <a href="javascript:;" class="text-muted mr10"><i class="ti-more mr5"></i>More</a>
                    <i class="ti-bookmark text-warning" data-toggle="tooltip" data-original-title="View tags"></i>
                </p>
                <hr>

                <div class="media">
                    <a class="pull-left" href="javascript:;">
                        <img class="media-object avatar avatar-sm" src="img/faceless.jpg" alt="">
                    </a>
                    <div class="comment">
                        <div class="comment-author h6 no-m">
                            <a href="javascript:;"><b>Harry Potter</b></a>
                        </div>
                        <div class="comment-meta small">MAY 2015, 22:04</div>
                        <p>
                            MIS or Computer Science is advisable.
                        </p>
                        <p class="small">
                            <a href="javascript:;" class="text-muted mr10"><i class="ti-comment mr5"></i>Comment</a>
                            <a href="javascript:;" class="text-muted mr10"><i class="ti-share mr5"></i>Share</a>
                            <a href="javascript:;" class="mr10 text-danger"><i class="ti-heart mr5"></i>Like</a>
                            <a href="javascript:;" class="text-muted mr10"><i class="ti-more mr5"></i>More</a>
                        </p>
                    </div>
                </div>
                <!--end media-->
                <hr>
                <div class="media">
                    <a class="pull-left" href="javascript:;">
                        <img class="media-object avatar avatar-sm" src="img/faceless.jpg" alt="">
                    </a>
                    <div class="comment">
                        <div class="comment-author h6 no-m">
                            <a href="javascript:;"><b>Jane Doe</b></a>
                        </div>
                        <div class="comment-meta small">10 JUNE 2015, 07:28</div>
                        <p>
                            I think CS is the best for me. However, can you throw some light on MIS dual degree program.
                        </p>
                        <p class="small">
                            <a href="javascript:;" class="text-muted mr10"><i class="ti-comment mr5"></i>Comment</a>
                            <a href="javascript:;" class="text-muted mr10"><i class="ti-share mr5"></i>Share</a>
                            <a href="javascript:;" class="mr10 text-danger"><i class="ti-heart mr5"></i>Like</a>
                            <a href="javascript:;" class="text-muted mr10"><i class="ti-more mr5"></i>More</a>
                        </p>
                    </div>
                    <hr>
                    <!--end media-->
                </div>
            </div>
            <div class="media">
                <a class="pull-left" href="javascript:;">
                    <img class="media-object avatar avatar-sm" src="img/faceless.jpg" alt="">
                </a>
                <div class="comment">
                    <div class="comment-author h6 no-m">
                        <a href="javascript:;"><b>Harry Potter</b></a>
                    </div>
                    <div class="comment-meta small">18 JUNE 2015, 19:20</div>
                    <p>
                        This program allows students to earn a combination of a master’s level specialist degree and a MBA together.  Both degrees separately would require 36 + 53 credit hours, or 89 credit hours total, but in the joint program students can earn both degrees with a smaller total of 63 semester credit hours.
                    </p>
                    <p class="small">
                        <a href="javascript:;" class="text-muted mr10"><i class="ti-comment mr5"></i>Comment</a>
                        <a href="javascript:;" class="text-muted mr10"><i class="ti-share mr5"></i>Share</a>
                        <a href="javascript:;" class="mr10 text-danger"><i class="ti-heart mr5"></i>Like</a>
                        <a href="javascript:;" class="text-muted mr10"><i class="ti-more mr5"></i>More</a>
                    </p>
                </div>
            </div>

        </div>

        <div class="panel-footer">
            <form role="form" class="form-horizontal">
                <div class="form-group no-m">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm no-border" placeholder="Join the conversation">
                                                    <span class="input-group-btn">
                                                    <button class="btn btn-default btn-sm" type="button">POST</button>
                                                </span>
                    </div>
                </div>
            </form>
        </div>
    </section>

</div>
<div class="col-md-4">

    <section class="widget">
        <div class="widget-header bg-info">
            <i class="ti-arrow-circle-up text-white"></i>
            <span class="h3">81.19</span>
            <span>%</span>
            <span class="small show text-uppercase">Class rank: 7 | <a href="#">Based on the most recent exam</a></span>
        </div>
        <div class="widget-body bg-info">
            <div class="text-center mt15 mb10">
                <span class="dash-line"><canvas width="300" height="40" style="display: inline-block; width: 300px; height: 40px; vertical-align: top;"></canvas></span>
            </div>
        </div>
        <footer class="widget-footer text-center">
            <div class="row">
                <div class="col-xs-3">
                    <div class="small show text-uppercase text-muted">Passed</div>
                    <div class="h4 no-m"><b>6</b>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="small show text-uppercase text-muted">Failed</div>
                    <div class="h4 no-m"><b>0</b>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="small show text-uppercase text-muted">Highest</div>
                    <div class="h4 no-m"><b>89</b>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="small show text-uppercase text-muted">Growth</div>
                    <div class="h4 no-m"><b>8%</b>
                    </div>
                </div>
            </div>
        </footer>
    </section>

    <section class="widget bg-danger">
        <div class="cover rounded" style="background-image: url(img/cover1.jpg)"></div>
        <div class="overlay rounded bg-color"></div>
        <div class="widget-header text-center">
            <a href="javascript:;"><i class="ti-plus text-white pull-right"></i></a>
            <a href="javascript:;"><i class="ti-menu text-white pull-left"></i></a>
            <span>Comments / Remarks on Scintin</span>
        </div>
        <div class="widget-body">
            <blockquote class="no-p no-m">
                <p>I've read each of Harry's books 8 times. I own 2 copies of each movie & I watch them all of the time.</p>
            </blockquote>
            <p class="pull-right">- Raini Rodriguez, Coordinator</p>
        </div>
        <footer class="widget-footer">
            <p class="small text-right">
                <a href="javascript:;" class="text-white mr10">Reply</a>
                <a href="javascript:;" class="text-white"><i class="ti-heart mr5"></i>Like</a>
            </p>
        </footer>
        <div class="widget-body">
            <blockquote class="no-p no-m">
                <p>Harry is like my family. All my friends and family loves him a lot.</p>
            </blockquote>
            <p class="pull-right">- Starlet, Teacher</p>
        </div>
        <footer class="widget-footer">
            <p class="small text-right">
                <a href="javascript:;" class="text-white mr10">Reply</a>
                <a href="javascript:;" class="text-white"><i class="ti-heart mr5"></i>Like</a>
            </p>
        </footer>
    </section>

    <section class="widget">
        <div class="cover rounded" style="background-image: url(img/cover1.jpg)"></div>
        <div class="overlay rounded bg-color"></div>
        <div class="widget-body">
            <div class="text-white">
                <br>
                <p>Harry potter has been involved in many witchcraft and wizardy assignments of Hogwarts.
                </p>
                <div class="mb10">
                    <a href="javascript:;" class="text-muted mr15">
                        <i class="ti-comment  mr5"></i>3523
                    </a>
                    <a href="javascript:;">
                        <i class="ti-heart  text-danger mr5"></i>12K
                    </a>
                </div>
                <ul class="text-white list-style-none">
                    <i class="fa fa-star text-danger"></i>
                    <i class="fa fa-star text-danger"></i>
                    <i class="fa fa-star text-danger"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                </ul>

                <a href="javascript:;" class="show small">View his work</a>
            </div>
        </div>
    </section>
</div>
</div>

<div class="row mb25">
    <div class="col-xs-12 text-right">
        <i class="ti-arrow-circle-up text-success"></i>
        <span class="h3">4.48</span>
        <span>k</span>
        <span class="small show">23% Projected Growth</span>
    </div>
</div>


