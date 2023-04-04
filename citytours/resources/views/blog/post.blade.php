@extends('layout.app')

@push('pagename')  @endpush

@push('css')
<link href="css/blog.css" rel="stylesheet">
@endpush

@push('content')
    @include('blog.banner')
    
    <main>
        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('text.page.home') }}</a></li>
                    <li><a href="{{ route('blog') }}">{{ __('text.page.blog') }}</a></li>
                    <li>Post</li>
                </ul>
            </div>
        </div>
        <!-- End position -->

        <div class="container margin_60">
            <div class="row">
                <aside class="col-lg-3 add_bottom_30">
                    @include('blog.left-widget')
                </aside>
                <!-- End aside -->

                <div class="col-lg-9">
                    <div class="box_style_1">
                        <div class="post nopadding">
                            <img src="img/blog-1.jpg" alt="Image" class="img-fluid">
                            <div class="post_info clearfix">
                                <div class="post-left">
                                    <ul>
                                        <li><i class="icon-calendar-empty"></i>On <span>12 Nov 2020</span>
                                        </li>
                                        <li><i class="icon-inbox-alt"></i>In <a href="#">Top tours</a>
                                        </li>
                                        <li><i class="icon-tags"></i>Tags <a href="#">Works</a> <a href="#">Personal</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-right"><i class="icon-comment"></i><a href="#">25 </a>Comments</div>
                            </div>
                            <h2>Duis aute irure dolor in reprehenderit</h2>
                            <p>
                                Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem.....
                            </p>
                            <p>
                                Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
                            </p>
                            <blockquote class="styled">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                                <small>Someone famous in <cite title="">Body of work</cite></small>
                            </blockquote>
                        </div>
                        <!-- end post -->
                    </div>
                    <!-- end box_style_1 -->

                    <h4>3 comments</h4>

                    <div id="comments">
                        <ol>
                            <li>
                                <div class="avatar">
                                    <a href="#"><img src="img/avatar1.jpg" alt="Image">
                                    </a>
                                </div>
                                <div class="comment_right clearfix">
                                    <div class="comment_info">
                                        Posted by <a href="#">Anna Smith</a><span>|</span> 25 apr 2019 <span>|</span><a href="#">Reply</a>
                                    </div>
                                    <p>
                                        Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
                                    </p>
                                </div>
                                <ul>
                                    <li>
                                        <div class="avatar">
                                            <a href="#"><img src="img/avatar2.jpg" alt="Image">
                                            </a>
                                        </div>

                                        <div class="comment_right clearfix">
                                            <div class="comment_info">
                                                Posted by <a href="#">Tom Sawyer</a><span>|</span> 25 apr 2019 <span>|</span><a href="#">Reply</a>
                                            </div>
                                            <p>
                                                Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
                                            </p>
                                            <p>
                                                Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="avatar">
                                    <a href="#"><img src="img/avatar3.jpg" alt="Image">
                                    </a>
                                </div>

                                <div class="comment_right clearfix">
                                    <div class="comment_info">
                                        Posted by <a href="#">Adam White</a><span>|</span> 25 apr 2019 <span>|</span><a href="#">Reply</a>
                                    </div>
                                    <p>
                                        Cursus tellus quis magna porta adipiscin
                                    </p>
                                </div>
                            </li>
                        </ol>
                    </div>
                    <!-- End Comments -->

                    <h4>Leave a comment</h4>
                    <form action="#" method="post">
                        <div class="form-group">
                            <input class="form-control style_2" type="text" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <input class="form-control style_2" type="text" name="mail" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control style_2" style="height:150px;" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="reset" class="btn_1" value="Clear form" />
                            <input type="submit" class="btn_1" value="Post Comment" />
                        </div>
                    </form>
                </div>
                <!-- End col-md-9-->

            </div>
            <!-- End row-->
        </div>
        <!-- End container -->
    </main>
    <!-- End main -->
@endpush