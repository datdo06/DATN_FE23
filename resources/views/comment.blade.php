@extends('client.layout.master')
@section('content')
<section class="section-sub-banner bg-9">
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2>Our BLOG</h2>
                <p>Lorem Ipsum is simply dummy text</p>
            </div>
        </div>

    </div>

</section>
<section class="section-blog bg-white">
    <div class="container">
        <div class="blog">
            <div class="row">

                <div class="col-md-8 col-md-push-4">
                    <div class="blog-content">
                        <h1 class="element-invisible">Blog detail</h1>
                        <!-- COMMENT -->
                        <div id="comments">
                            @foreach ($results as $r)
                            <h4 class="comment-title">COMMENT ({{ $r->comment_count }})</h4>
                            @endforeach
                            <ul class="commentlist">
                                @foreach ($comment as $c)
                                <li>
                                    <div class="comment-body">

                                        <a class="comment-avatar"><img src="{{ asset('img/user/' . $c->name . '-' . $c->uid . '/' . $c->avatar) }}" alt=""></a>

                                        <h4 class="comment-subject">{{ $c->com_subject }}</h4>
                                        <p>{{ $c->com_content }}.</p>

                                        <span class="comment-meta">
                                            <a href="#">{{ $c->name }}</a> - {{ $c->created_at }}
                                        </span>

                                      

                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- END / COMMENT -->

                        <!-- COMMENT RESPOND -->
                        <div class="comment-respond">
                            <h3 class="comment-reply-title">LEAVE A COMMENT</h3>
                            <form action="{{ route('postComment', ['id' => $room->id]) }}" method="post" class="comment-form">
                               @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="text" class="field-text" placeholder="Subject"  name="com_subject" required>
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea placeholder="Your comment"  name="com_content" class="field-textarea" required></textarea>
                                    </div>
                                    <div class="col-sm-12">
                                        <button class="awe-btn awe-btn-14">SUBMIT COMMENT</button>
                                    </div>
                                </div>           
                            </form>
                        </div>
                        <!-- END COMMENT RESPOND -->

                    </div>
                </div> 

                <div class="col-md-4 col-md-pull-8">
                    <div class="sidebar">

                        <!-- WIDGET CHECK AVAILABILITY -->
                        <div class="widget widget_check_availability">

                            <h4 class="widget-title">YOUR RESERVATION</h4>

                            <div class="check_availability">

                                <h6 class="check_availability_title">your stay dates</h6>
                                
                                <div class="check_availability-field">
                                    <label>Arrive</label>
                                    <input type="text" class="awe-calendar awe-input from" placeholder="Arrive">
                                </div>
                                
                                <div class="check_availability-field">
                                    <label>Depature</label>
                                    <input type="text" class="awe-calendar awe-input to" placeholder="Depature">
                                </div>
                                
                                <h6 class="check_availability_title">ROOMS &amp; GUest</h6>
                                
                                <div class="check_availability-field">
                                    <label>ROOMS</label>
                                    <select class="awe-select">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                    </select>
                                </div>
                                
                                <div class="check_availability_group">
                                
                                    <span class="label-group">ROOM 1</span>
                                
                                    <div class="check_availability-field_group">
                                
                                        <div class="check_availability-field">
                                            <label>Adult</label>
                                            <select class="awe-select">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                            </select>
                                        </div>
                                
                                        <div class="check_availability-field">
                                            <label>Chirld</label>
                                            <select class="awe-select">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                            </select>
                                        </div>
                                
                                    </div>
                                
                                </div>
                                
                                <button class="awe-btn awe-btn-13">CHECK AVAILABLE</button>
                            </div>

                        </div>
                    

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection