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
                        <div class="post">
                            <a href="{{ route('blog.post') }}" title="{{ route('blog.post') }}"><img src="img/blog-3.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="post_info clearfix">
                                <div class="post-left">
                                    <ul>
                                        <li><i class="icon-calendar-empty"></i> On <span>12 Nov 2020</span>
                                        </li>
                                        <li><i class="icon-inbox-alt"></i> In <a href="#">Top tours</a>
                                        </li>
                                        <li><i class="icon-tags"></i> Tags <a href="#">Works</a>, <a href="#">Personal</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-right"><i class="icon-comment"></i><a href="#">25 </a>
                                </div>
                            </div>
                            <h2>Duis aute irure dolor in reprehenderit</h2>
                            <p>
                                Ludus albucius adversarium eam eu. Sit eu reque tation aliquip. Quo no dolorum albucius lucilius, hinc eligendi ut sed. Ex nam quot ferri suscipit, mea ne legere alterum repudiandae. Ei pri quaerendum intellegebat, ut vel consequuntur voluptatibus. Et volumus sententiae adversarium duo......
                            </p>
                            <p>
                                Ludus albucius adversarium eam eu. Sit eu reque tation aliquip. Quo no dolorum albucius lucilius, hinc eligendi ut sed. Ex nam quot ferri suscipit, mea ne legere alterum repudiandae. Ei pri quaerendum intellegebat, ut vel consequuntur voluptatibus. Et volumus sententiae adversarium duo......
                            </p>
                            <a href="{{ route('blog.post') }}" class="btn_1" title="{{ route('blog.post') }}">Read more</a>
                        </div>
                        <!-- end post -->
    
                        <hr>
    
                        <div class="post">
                            <a href="{{ route('blog.post') }}" title="{{ route('blog.post') }}"><img src="img/blog-1.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="post_info clearfix">
                                <div class="post-left">
                                    <ul>
                                        <li><i class="icon-calendar-empty"></i> On <span>12 Nov 2020</span>
                                        </li>
                                        <li><i class="icon-inbox-alt"></i> In <a href="#">Top tours</a>
                                        </li>
                                        <li><i class="icon-tags"></i> Tags <a href="#">Works</a>, <a href="#">Personal</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-right"><i class="icon-comment"></i><a href="#">25 </a>Comments</div>
                            </div>
                            <h2>Duis aute irure dolor in reprehenderit</h2>
                            <p>
                                Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem.....
                            </p>
                            <a href="{{ route('blog.post') }}" class=" btn_1">Read more</a>
                        </div>
                        <!-- end post -->
    
                        <hr>
    
                        <div class="post">
                            <a href="{{ route('blog.post') }}" title="{{ route('blog.post') }}"><img src="img/blog-2.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="post_info clearfix">
                                <div class="post-left">
                                    <ul>
                                        <li><i class="icon-calendar-empty"></i> On <span>12 Nov 2020</span>
                                        </li>
                                        <li><i class="icon-inbox-alt"></i> In <a href="#">Top tours</a>
                                        </li>
                                        <li><i class="icon-tags"></i> Tags <a href="#">Works</a>, <a href="#">Personal</a>
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
                                Ludus albucius adversarium eam eu. Sit eu reque tation aliquip. Quo no dolorum albucius lucilius, hinc eligendi ut sed. Ex nam quot ferri suscipit, mea ne legere alterum repudiandae. Ei pri quaerendum intellegebat, ut vel consequuntur voluptatibus. Et volumus sententiae adversarium duo......
                            </p>
                            <a href="{{ route('blog.post') }}" class="btn_1" title="{{ route('blog.post') }}">Read more</a>
                        </div>
                        <!-- end post -->
                    </div>
                    <!-- end box style -->
    
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><span class="page-link">1</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- end pagination-->
                    
                </div>
                <!-- End col-md-9-->
            </div>
            <!-- End row-->
        </div>
        <!-- End container -->
    </main>
    <!-- End main -->
@endpush