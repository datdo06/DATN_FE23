@extends('client.layout.master')
@section('content')

    <!-- SUB BANNER -->
    <section class="section-sub-banner bg-9">
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>CONTACT WITH US</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing</p>
                </div>
            </div>

        </div>

    </section>
    <!-- END / SUB BANNER -->

    <!-- CONTACT -->
    <section class="section-contact">
        <div class="container">
            <div class="contact">
                <div class="row">
                    <div class="col-md-6 col-lg-5">
                        <div class="text">
                            <h2>Contact</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                            <ul>
                                <li><i class="icon lotus-icon-location"></i> 225 Beach Street, Australian</li>
                                <li><i class="icon lotus-icon-phone"></i> +61 2 6854 8496</li>
                                <li><i class="icon fa fa-envelope-o"></i> <a href="https://landing.engotheme.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="630f0c1716100b0c17060f23040e020a0f4d000c0e">[email&#160;protected]</a></li>
                            </ul>
                        </div>
                        <div class="contact-location">
                            <a class="btn-collapse" data-toggle="collapse" href="#location">OTHER LOCATION <span class="fa fa-angle-down"></span></a>
                            <div class="collapse" id="location">
                                <div class="location-group">
                                    <h6>NORTH AMERICA</h6>
                                    <span>Caribbean, French West Indies</span>
                                    <!-- ITEM -->
                                    <div class="location-item" data-location="39.0926986,-94.5747324">
                                        <div class="img">
                                            <img src="images/contact/img-1.jpg" alt="">
                                            <i class="fa  fa-map-marker"></i>
                                        </div>
                                        <div class="text">
                                            <address>PO Box 4077, 2584 St Martin, CEDEX, French West Indies</address>
                                            <p>
                                                Tel: 858 634 8975 <br>
                                                Fax: +1 212 854 7039
                                            </p>
                                        </div>
                                    </div>
                                    <!-- END / ITEM -->

                                    <!-- ITEM -->
                                    <div class="location-item" data-location="39.0912284,-94.5743515">
                                        <div class="img">
                                            <img src="images/contact/img-2.jpg" alt="">
                                            <i class="fa  fa-map-marker"></i>
                                        </div>
                                        <div class="text">
                                            <address>PO Box 4077, 2584 St Martin, CEDEX, French West Indies</address>
                                            <p>
                                                Tel: 858 634 8975 <br>
                                                Fax: +1 212 854 7039
                                            </p>
                                        </div>
                                    </div>
                                    <!-- END / ITEM -->

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 col-lg-6 col-lg-offset-1">
                        <div class="contact-form">
                            <form action="https://landing.engotheme.com/html/lotus/demo/send_mail_contact.php" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="field-text"  name="name" placeholder="Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="field-text" name="email" placeholder="Email">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" class="field-text" name="subject" placeholder="Subject">
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea cols="30" rows="10" name="message"  class="field-textarea" placeholder="Write what do you want"></textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="awe-btn awe-btn-13">SEND</button>
                                    </div>
                                </div>
                                <div id="contact-content"></div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END / CONTACT -->

    <!-- MAP -->
    <section class="section-map">
        <h1 class="element-invisible">Map</h1>
        <div class="contact-map">
            <div id="map" data-locations="21.0285,105.8542" data-center="21.0285,105.8542"></div>
        </div>
    </section>
    <!-- END / MAP -->


@endsection
