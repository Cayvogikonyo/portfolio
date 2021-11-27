       <!-- Offcanvas Start -->
       <div class="offcanvas offcanvas-end bg-white shadow" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
           
            <div class="offcanvas-body p-4">
                <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>

                <div class="row">
                    <div class="col-12">
                        <img src="images/contact.svg" class="img-fluid d-block mx-auto" style="max-width: 256px;" alt="">
                        <div class="card border-0 mt-2" style="z-index: 1">
                            <div class="card-body p-0">
                                <form method="post" name="myForm" onsubmit="return validateForm(event)">
                                    <p id="error-msg" class="mb-0"></p>
                                    <div id="simple-msg" class="rounded  bg-success"></div>
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input name="name" id="name" type="text" class="form-control" placeholder="Name :">
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input name="email" id="email" type="email" class="form-control" placeholder="Email :">
                                                </div>
                                            </div> 
                                        </div><!--end col-->
    
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Subject</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="book" class="fea icon-sm icons"></i>
                                                    <input name="subject" id="subject" class="form-control" placeholder="subject :">
                                                </div>
                                            </div>
                                        </div><!--end col-->
    
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Message <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
                                                    <textarea name="message" id="comments" rows="4" class="form-control" placeholder="Message :"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>

            
        </div>
        <!-- Offcanvas End -->
