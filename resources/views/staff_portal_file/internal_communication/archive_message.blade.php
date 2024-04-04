@extends('staff.staff_dashboard')

@section('staff')

    <div class="container-fluid relative">
    <div class="row">
        <div class="col-lg-2 mail-box-detail"></div>
        <div class="col-lg-8 mail-box-detail">
            <div class="iq-card">
                <div class="iq-card-body p-0">
                <div class="">
                    <div class="iq-email-to-list p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <ul>
                            <li>
                                <a href="#" id="navbarDropdown" data-toggle="dropdown">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label checkbox_bck" for="customCheck1"></label>
                                    </div>
                                </a>
                                
                            </li>
                            <li data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><i class="ri-delete-bin-line"></i></a></li>
                            </ul>
                            <div class="iq-email-search d-flex align-items-center">
                            <form class="mr-3 position-relative">
                                <div class="form-group mb-0">
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search">
                                    <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                </div>
                            </form>
                            <ul class="d-flex align-items-center">
                                <li class="mr-3">
                                    <a class="font-size-14" href="#" id="navbarDropdown" data-toggle="dropdown">
                                    1 - 50 of 505
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">20 per page</a>
                                        <a class="dropdown-item" href="#">50 per page</a>
                                        <a class="dropdown-item" href="#">100 per page</a>
                                    </div>
                                </li>
                                <li data-toggle="tooltip" data-placement="top" title="Previous"><a href="#"><i class="ri-arrow-left-s-line"></i></a></li>
                                <li data-toggle="tooltip" data-placement="top" title="Next"><a href="#"><i class="ri-arrow-right-s-line"></i></a></li>
                                
                            </ul>
                            </div>
                        </div>
                    </div>
                    <div class="iq-email-listbox">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="mail-inbox" role="tabpanel">
                            <ul class="iq-email-sender-list">
                                <li class="iq-unread">
                                    <div class="d-flex align-self-center">
                                        <div class="iq-email-sender-info">
                                        <div class="iq-checkbox-mail">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="mailk">
                                                <label class="custom-control-label checkbox_bck" for="mailk"></label>
                                            </div>
                                        </div>
                                        <span class="ri-mail-open-line"></span>
                                        <a href="javascript: void(0);" class="iq-email-title">Jopour Xiong (Me)</a>
                                        </div>
                                        <div class="iq-email-content">
                                        <a href="javascript: void(0);" class="iq-email-subject">Mackenzie Niko (@Mackenzieniko) has sent
                                        you a direct message on Twitter! &nbsp;–&nbsp;
                                        <span>@Mackenzieniko - Very cool :) Nicklas, You have a new direct message.</span>
                                        </a>
                                        <div class="iq-email-date">08:00 am</div>
                                        </div>
                                        <ul class="iq-social-media">
                                        <li><a href="#"><i class="ri-delete-bin-2-line"></i></a></li>
                                        <li><a href="#"><i class="ri-mail-line"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <div class="email-app-details">
                                    <div class="iq-card">
                                        <div class="iq-card-body p-0">
                                        <div class="">
                                            <div class="iq-email-to-list p-3">
                                                <div class="d-flex justify-content-between">
                                                    <ul>
                                                    <li class="mr-3">
                                                        <a href="javascript: void(0);">
                                                            <h4 class="m-0"><i class="ri-arrow-left-line"></i></h4>
                                                        </a>
                                                    </li>
                                                    <li data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><i class="ri-delete-bin-line"></i></a></li>
                                                    </ul>
                                                    <div class="iq-email-search d-flex">
                                                    <ul>
                                                        <li class="mr-3">
                                                            <a class="font-size-14" href="#">1 of 505</a>
                                                        </li>
                                                        <li data-toggle="tooltip" data-placement="top" title="Previous"><a href="#"><i class="ri-arrow-left-s-line"></i></a></li>
                                                        <li data-toggle="tooltip" data-placement="top" title="Next"><a href="#"><i class="ri-arrow-right-s-line"></i></a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-0">
                                            <div class="iq-inbox-subject p-3">
                                                <h5 class="mt-0">Your elite author Graphic Optimization reward is ready!</h5>
                                                <div class="iq-inbox-subject-info">
                                                    <div class="iq-subject-info">
                                                    <img src="../assets/images/user/blank.png" class="img-fluid rounded-circle" alt="#">
                                                    <div class="iq-subject-status align-self-center">
                                                        <h6 class="mb-0">ABC <a href="dummy@gmail.com"><dummy@gmail.com></a></h6>
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            to Me
                                                            </a>
                                                            <div class="dropdown-menu font-size-12" aria-labelledby="dropdownMenuButton">
                                                                <table class="iq-inbox-details">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>from:</td>
                                                                        <td>Medium Daily Digest</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>reply-to:</td>
                                                                        <td>noreply@gmail.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>to:</td>
                                                                        <td>iqonicdesigns@gmail.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>date:</td>
                                                                        <td>13 Dec 2019, 08:30</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>subject:</td>
                                                                        <td>The Golden Rule</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>security:</td>
                                                                        <td>Standard encryption</td>
                                                                    </tr>
                                                                </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="float-right align-self-center">Jan 15, 2029, 10:20AM</span>
                                                    </div>
                                                    <div class="iq-inbox-body mt-5">
                                                    <p>Hi Jopour Xiong,</p>
                                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
                                                    <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                                    <p class="mt-5 mb-0">Regards,<span class="d-inline-block w-100">John Deo</span></p>
                                                    <div class="box-msg mt-3">
                                                        <span class="button-msg" >Reply</span>
                                                        <form action="" id="form">
                                                        <div class="form-group ">
                                                            <label for="fname">Message</label>
                                                            <textarea type="text" class="form-control w-100" rows="5" id="fname" placeholder="Type Your Message"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                    </div>
                                                    <hr>
                                                    <div class="attegement">
                                                    <h6 class="mb-2">ATTACHED FILES:</h6>
                                                    <ul>
                                                        <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.doc</span>
                                                        </li>
                                                        <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.pdf</span>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <li>
                                    <div class="d-flex align-self-center">
                                        <div class="iq-email-sender-info">
                                        <div class="iq-checkbox-mail">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="mailk1">
                                                <label class="custom-control-label checkbox_bck" for="mailk1"></label>
                                            </div>
                                        </div>
                                        <span class="ri-mail-open-line"></span>
                                        <a href="javascript: void(0);" class="iq-email-title">Deray Billings (Me)</a>
                                        </div>
                                        <div class="iq-email-content">
                                        <a href="javascript: void(0);" class="iq-email-subject">Megan Allen (@meganallen) has sent
                                        you a direct message on Twitter! &nbsp;–&nbsp;
                                        <span>@LucasKriebel - Very cool :) Nicklas, You have a new direct message.</span>
                                        </a>
                                        <div class="iq-email-date">08:15 am</div>
                                        </div>
                                        <ul class="iq-social-media">
                                        <li><a href="#"><i class="ri-delete-bin-2-line"></i></a></li>
                                        <li><a href="#"><i class="ri-mail-line"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <div class="email-app-details">
                                    <div class="iq-card">
                                        <div class="iq-card-body p-0">
                                        <div class="">
                                            <div class="iq-email-to-list p-3">
                                                <div class="d-flex justify-content-between">
                                                <ul>
                                                    <li class="mr-3">
                                                        <a href="javascript: void(0);">
                                                            <h4 class="m-0"><i class="ri-arrow-left-line"></i></h4>
                                                        </a>
                                                    </li>
                                                    <li data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><i class="ri-delete-bin-line"></i></a></li>
                                                    </ul>
                                                    <div class="iq-email-search d-flex">
                                                    <ul>
                                                        <li class="mr-3">
                                                            <a class="font-size-14" href="#">1 of 505</a>
                                                        </li>
                                                        <li data-toggle="tooltip" data-placement="top" title="Previous"><a href="#"><i class="ri-arrow-left-s-line"></i></a></li>
                                                        <li data-toggle="tooltip" data-placement="top" title="Next"><a href="#"><i class="ri-arrow-right-s-line"></i></a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-0">
                                            <div class="iq-inbox-subject p-3">
                                                <h5 class="mt-0">Your elite author Graphic Optimization reward is ready!</h5>
                                                <div class="iq-inbox-subject-info">
                                                    <div class="iq-subject-info">
                                                    <img src="../assets/images/user/blank.png" class="img-fluid rounded-circle" alt="#">
                                                    <div class="iq-subject-status align-self-center">
                                                        <h6 class="mb-0">ABC team <a href="dummy@gmail.com"><dummy@gmail.com></a></h6>
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            to Me
                                                            </a>
                                                            <div class="dropdown-menu font-size-12" aria-labelledby="dropdownMenuButton">
                                                                <table class="iq-inbox-details">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>from:</td>
                                                                        <td>Medium Daily Digest</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>reply-to:</td>
                                                                        <td>noreply@gmail.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>to:</td>
                                                                        <td>iqonicdesigns@gmail.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>date:</td>
                                                                        <td>13 Dec 2019, 08:30</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>subject:</td>
                                                                        <td>The Golden Rule</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>security:</td>
                                                                        <td>Standard encryption</td>
                                                                    </tr>
                                                                </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="float-right align-self-center">Jan 15, 2029, 10:20AM</span>
                                                    </div>
                                                    <div class="iq-inbox-body mt-5">
                                                    <p>Hi Deray Billings,</p>
                                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
                                                    <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                                    <p class="mt-5 mb-0">Regards,<span class="d-inline-block w-100">John Deo</span></p>
                                                    <div class="box-msg mt-3">
                                                        <span class="button-msg" >Reply</span>
                                                        <form action="" id="form">
                                                        <div class="form-group ">
                                                            <label for="fname">Message</label>
                                                            <textarea type="text" class="form-control w-100" rows="5" id="fname" placeholder="Type Your Message"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                    </div>
                                                    <hr>
                                                    <div class="attegement">
                                                    <h6 class="mb-2">ATTACHED FILES:</h6>
                                                    <ul>
                                                        <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.doc</span>
                                                        </li>
                                                        <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.pdf</span>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <li>
                                    <div class="d-flex align-self-center">
                                        <div class="iq-email-sender-info">
                                        <div class="iq-checkbox-mail">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="mailk2">
                                                <label class="custom-control-label checkbox_bck" for="mailk2"></label>
                                            </div>
                                        </div>
                                        <span class="ri-mail-open-line"></span>
                                        <a href="javascript: void(0);" class="iq-email-title">Lauren Drury (Me)</a>
                                        </div>
                                        <div class="iq-email-content">
                                        <a href="javascript: void(0);" class="iq-email-subject">Dixa Horton (@dixahorton) has sent
                                        you a direct message on Twitter! &nbsp;–&nbsp;
                                        <span>@LucasKriebel - Very cool :) Nicklas, You have a new direct message.</span>
                                        </a>
                                        <div class="iq-email-date">11:49 am</div>
                                        </div>
                                        <ul class="iq-social-media">
                                        <li><a href="#"><i class="ri-delete-bin-2-line"></i></a></li>
                                        <li><a href="#"><i class="ri-mail-line"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <div class="email-app-details">
                                    <div class="iq-card">
                                        <div class="iq-card-body p-0">
                                        <div class="">
                                            <div class="iq-email-to-list p-3">
                                                <div class="d-flex justify-content-between">
                                                <ul>
                                                    <li class="mr-3">
                                                        <a href="javascript: void(0);">
                                                            <h4 class="m-0"><i class="ri-arrow-left-line"></i></h4>
                                                        </a>
                                                    </li>
                                                    <li data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><i class="ri-delete-bin-line"></i></a></li>
                                                    </ul>
                                                    <div class="iq-email-search d-flex">
                                                    <ul>
                                                        <li class="mr-3">
                                                            <a class="font-size-14" href="#">1 of 505</a>
                                                        </li>
                                                        <li data-toggle="tooltip" data-placement="top" title="Previous"><a href="#"><i class="ri-arrow-left-s-line"></i></a></li>
                                                        <li data-toggle="tooltip" data-placement="top" title="Next"><a href="#"><i class="ri-arrow-right-s-line"></i></a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-0">
                                            <div class="iq-inbox-subject p-3">
                                                <h5 class="mt-0">Your elite author Graphic Optimization reward is ready!</h5>
                                                <div class="iq-inbox-subject-info">
                                                    <div class="iq-subject-info">
                                                    <img src="../assets/images/user/blank.png" class="img-fluid rounded-circle" alt="#">
                                                    <div class="iq-subject-status align-self-center">
                                                        <h6 class="mb-0">ABC team <a href="dummy@gmail.com"><dummy@gmail.com></a></h6>
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            to Me
                                                            </a>
                                                            <div class="dropdown-menu font-size-12" aria-labelledby="dropdownMenuButton">
                                                                <table class="iq-inbox-details">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>from:</td>
                                                                        <td>Medium Daily Digest</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>reply-to:</td>
                                                                        <td>noreply@gmail.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>to:</td>
                                                                        <td>iqonicdesigns@gmail.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>date:</td>
                                                                        <td>13 Dec 2019, 08:30</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>subject:</td>
                                                                        <td>The Golden Rule</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>security:</td>
                                                                        <td>Standard encryption</td>
                                                                    </tr>
                                                                </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="float-right align-self-center">Jan 15, 2029, 10:20AM</span>
                                                    </div>
                                                    <div class="iq-inbox-body mt-5">
                                                    <p>Hi Lauren Drury,</p>
                                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
                                                    <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                                    <p class="mt-5 mb-0">Regards,<span class="d-inline-block w-100">John Deo</span></p>
                                                    </div>
                                                    <hr>
                                                    <div class="attegement">
                                                    <h6 class="mb-2">ATTACHED FILES:</h6>
                                                    <ul>
                                                        <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.doc</span>
                                                        </li>
                                                        <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.pdf</span>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <li>
                                    <div class="d-flex align-self-center">
                                        <div class="iq-email-sender-info">
                                        <div class="iq-checkbox-mail">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="mailk3">
                                                <label class="custom-control-label checkbox_bck" for="mailk3"></label>
                                            </div>
                                        </div>
                                        <span class="ri-mail-open-line"></span>
                                        <a href="javascript: void(0);" class="iq-email-title">Fabian Ros (Me)</a>
                                        </div>
                                        <div class="iq-email-content">
                                        <a href="javascript: void(0);" class="iq-email-subject">Jecno Mac (@jecnomac) has sent
                                        you a direct message on Twitter! &nbsp;–&nbsp;
                                        <span>@LucasKriebel - Very cool :) Nicklas, You have a new direct message.</span>
                                        </a>
                                        <div class="iq-email-date">11:49 am</div>
                                        </div>
                                        <ul class="iq-social-media">
                                        <li><a href="#"><i class="ri-delete-bin-2-line"></i></a></li>
                                        <li><a href="#"><i class="ri-mail-line"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <div class="email-app-details">
                                    <div class="iq-card">
                                        <div class="iq-card-body p-0">
                                        <div class="">
                                            <div class="iq-email-to-list p-3">
                                                <div class="d-flex justify-content-between">
                                                <ul>
                                                    <li class="mr-3">
                                                        <a href="javascript: void(0);">
                                                            <h4 class="m-0"><i class="ri-arrow-left-line"></i></h4>
                                                        </a>
                                                    </li>
                                                    <li data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><i class="ri-delete-bin-line"></i></a></li>
                                                    </ul>
                                                    <div class="iq-email-search d-flex">
                                                    <ul>
                                                        <li class="mr-3">
                                                            <a class="font-size-14" href="#">1 of 505</a>
                                                        </li>
                                                        <li data-toggle="tooltip" data-placement="top" title="Previous"><a href="#"><i class="ri-arrow-left-s-line"></i></a></li>
                                                        <li data-toggle="tooltip" data-placement="top" title="Next"><a href="#"><i class="ri-arrow-right-s-line"></i></a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-0">
                                            <div class="iq-inbox-subject p-3">
                                                <h5 class="mt-0">Your elite author Graphic Optimization reward is ready!</h5>
                                                <div class="iq-inbox-subject-info">
                                                    <div class="iq-subject-info">
                                                    <img src="../assets/images/user/blank.png" class="img-fluid rounded-circle" alt="#">
                                                    <div class="iq-subject-status align-self-center">
                                                        <h6 class="mb-0">ABC team <a href="dummy@gmail.com"><dummy@gmail.com></a></h6>
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            to Me
                                                            </a>
                                                            <div class="dropdown-menu font-size-12" aria-labelledby="dropdownMenuButton">
                                                                <table class="iq-inbox-details">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>from:</td>
                                                                        <td>Medium Daily Digest</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>reply-to:</td>
                                                                        <td>noreply@gmail.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>to:</td>
                                                                        <td>iqonicdesigns@gmail.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>date:</td>
                                                                        <td>13 Dec 2019, 08:30</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>subject:</td>
                                                                        <td>The Golden Rule</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>security:</td>
                                                                        <td>Standard encryption</td>
                                                                    </tr>
                                                                </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="float-right align-self-center">Jan 15, 2029, 10:20AM</span>
                                                    </div>
                                                    <div class="iq-inbox-body mt-5">
                                                    <p>Hi Fabian Ros,</p>
                                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
                                                    <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                                    <p class="mt-5 mb-0">Regards,<span class="d-inline-block w-100">John Deo</span></p>
                                                    </div>
                                                    <hr>
                                                    <div class="attegement">
                                                    <h6 class="mb-2">ATTACHED FILES:</h6>
                                                    <ul>
                                                        <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.doc</span>
                                                        </li>
                                                        <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.pdf</span>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <li>
                                    <div class="d-flex align-self-center">
                                        <div class="iq-email-sender-info">
                                        <div class="iq-checkbox-mail">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="mailk4">
                                                <label class="custom-control-label checkbox_bck" for="mailk4"></label>
                                            </div>
                                        </div>
                                        <span class="ri-mail-open-line"></span>
                                        <a href="javascript: void(0);" class="iq-email-title">Dixa Horton (Me)</a>
                                        </div>
                                        <div class="iq-email-content">
                                        <a href="javascript: void(0);" class="iq-email-subject">Let Hunre (@lethunre) has sent
                                        you a direct message on Twitter! &nbsp;–&nbsp;
                                        <span>@LucasKriebel - Very cool :) Nicklas, You have a new direct message.</span>
                                        </a>
                                        <div class="iq-email-date">11:49 am</div>
                                        </div>
                                        <ul class="iq-social-media">
                                        <li><a href="#"><i class="ri-delete-bin-2-line"></i></a></li>
                                        <li><a href="#"><i class="ri-mail-line"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <div class="email-app-details">
                                    <div class="iq-card">
                                        <div class="iq-card-body p-0">
                                        <div class="">
                                            <div class="iq-email-to-list p-3">
                                                <div class="d-flex justify-content-between">
                                                <ul>
                                                    <li class="mr-3">
                                                        <a href="javascript: void(0);">
                                                            <h4 class="m-0"><i class="ri-arrow-left-line"></i></h4>
                                                        </a>
                                                    </li>
                                                    <li data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><i class="ri-delete-bin-line"></i></a></li>
                                                    </ul>
                                                    <div class="iq-email-search d-flex">
                                                    <ul>
                                                        <li class="mr-3">
                                                            <a class="font-size-14" href="#">1 of 505</a>
                                                        </li>
                                                        <li data-toggle="tooltip" data-placement="top" title="Previous"><a href="#"><i class="ri-arrow-left-s-line"></i></a></li>
                                                        <li data-toggle="tooltip" data-placement="top" title="Next"><a href="#"><i class="ri-arrow-right-s-line"></i></a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-0">
                                            <div class="iq-inbox-subject p-3">
                                                <h5 class="mt-0">Your elite author Graphic Optimization reward is ready!</h5>
                                                <div class="iq-inbox-subject-info">
                                                    <div class="iq-subject-info">
                                                    <img src="../assets/images/user/blank.png" class="img-fluid rounded-circle" alt="#">
                                                    <div class="iq-subject-status align-self-center">
                                                        <h6 class="mb-0">ABC team <a href="dummy@gmail.com"><dummy@vito.com></a></h6>
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            to Me
                                                            </a>
                                                            <div class="dropdown-menu font-size-12" aria-labelledby="dropdownMenuButton">
                                                                <table class="iq-inbox-details">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>from:</td>
                                                                        <td>Medium Daily Digest</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>reply-to:</td>
                                                                        <td>noreply@gmail.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>to:</td>
                                                                        <td>iqonicdesigns@gmail.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>date:</td>
                                                                        <td>13 Dec 2019, 08:30</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>subject:</td>
                                                                        <td>The Golden Rule</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>security:</td>
                                                                        <td>Standard encryption</td>
                                                                    </tr>
                                                                </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="float-right align-self-center">Jan 15, 2029, 10:20AM</span>
                                                    </div>
                                                    <div class="iq-inbox-body mt-5">
                                                    <p>Hi Dixa Horton,</p>
                                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
                                                    <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                                    <p class="mt-5 mb-0">Regards,<span class="d-inline-block w-100">John Deo</span></p>
                                                    </div>
                                                    <hr>
                                                    <div class="attegement">
                                                    <h6 class="mb-2">ATTACHED FILES:</h6>
                                                    <ul>
                                                        <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.doc</span>
                                                        </li>
                                                        <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.pdf</span>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <li class="iq-unread">
                                    <div class="d-flex align-self-center">
                                        <div class="iq-email-sender-info">
                                        <div class="iq-checkbox-mail">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="mailk5">
                                                <label class="custom-control-label checkbox_bck" for="mailk5"></label>
                                            </div>
                                        </div>
                                        <span class="ri-mail-open-line"></span>
                                        <a href="javascript: void(0);" class="iq-email-title">Megan Allen (Me)</a>
                                        </div>
                                        <div class="iq-email-content">
                                        <a href="javascript: void(0);" class="iq-email-subject">Eb Begg (@ebbegg) has sent
                                        you a direct message on Twitter! &nbsp;–&nbsp;
                                        <span>@LucasKriebel - Very cool :) Nicklas, You have a new direct message.</span>
                                        </a>
                                        <div class="iq-email-date">11:49 am</div>
                                        </div>
                                        <ul class="iq-social-media">
                                        <li><a href="#"><i class="ri-delete-bin-2-line"></i></a></li>
                                        <li><a href="#"><i class="ri-mail-line"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <div class="email-app-details">
                                    <div class="iq-card">
                                        <div class="iq-card-body p-0">
                                        <div class="">
                                            <div class="iq-email-to-list p-3">
                                                <div class="d-flex justify-content-between">
                                                <ul>
                                                    <li class="mr-3">
                                                        <a href="javascript: void(0);">
                                                            <h4 class="m-0"><i class="ri-arrow-left-line"></i></h4>
                                                        </a>
                                                    </li>
                                                    <li data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><i class="ri-delete-bin-line"></i></a></li>
                                                    </ul>
                                                    <div class="iq-email-search d-flex">
                                                    <ul>
                                                        <li class="mr-3">
                                                            <a class="font-size-14" href="#">1 of 505</a>
                                                        </li>
                                                        <li data-toggle="tooltip" data-placement="top" title="Previous"><a href="#"><i class="ri-arrow-left-s-line"></i></a></li>
                                                        <li data-toggle="tooltip" data-placement="top" title="Next"><a href="#"><i class="ri-arrow-right-s-line"></i></a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-0">
                                            <div class="iq-inbox-subject p-3">
                                                <h5 class="mt-0">Your elite author Graphic Optimization reward is ready!</h5>
                                                <div class="iq-inbox-subject-info">
                                                    <div class="iq-subject-info">
                                                    <img src="../assets/images/user/blank.png" class="img-fluid rounded-circle" alt="#">
                                                    <div class="iq-subject-status align-self-center">
                                                        <h6 class="mb-0">ABC team <a href="dummy@gmail.com"><dummy@gmail.com></a></h6>
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            to Me
                                                            </a>
                                                            <div class="dropdown-menu font-size-12" aria-labelledby="dropdownMenuButton">
                                                                <table class="iq-inbox-details">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>from:</td>
                                                                        <td>Medium Daily Digest</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>reply-to:</td>
                                                                        <td>noreply@gmail.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>to:</td>
                                                                        <td>iqonicdesigns@gmail.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>date:</td>
                                                                        <td>13 Dec 2019, 08:30</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>subject:</td>
                                                                        <td>The Golden Rule</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>security:</td>
                                                                        <td>Standard encryption</td>
                                                                    </tr>
                                                                </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="float-right align-self-center">Jan 15, 2029, 10:20AM</span>
                                                    </div>
                                                    <div class="iq-inbox-body mt-5">
                                                    <p>Hi Megan Allen,</p>
                                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
                                                    <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                                    <p class="mt-5 mb-0">Regards,<span class="d-inline-block w-100">John Deo</span></p>
                                                    </div>
                                                    <hr>
                                                    <div class="attegement">
                                                    <h6 class="mb-2">ATTACHED FILES:</h6>
                                                    <ul>
                                                        <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.doc</span>
                                                        </li>
                                                        <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.pdf</span>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <li>
                                    <div class="d-flex align-self-center">
                                        <div class="iq-email-sender-info">
                                        <div class="iq-checkbox-mail">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="mailk6">
                                                <label class="custom-control-labelcheckbox_bck" for="mailk6"></label>
                                            </div>
                                        </div>
                                        <span class="ri-mail-open-line"></span>
                                        <a href="javascript: void(0);" class="iq-email-title">Jopour Xiong (Me)</a>
                                        </div>
                                        <div class="iq-email-content">
                                        <a href="javascript: void(0);" class="iq-email-subject">Mackenzie Niko (@mackenzieniko) has sent
                                        you a direct message on Twitter! &nbsp;–&nbsp;
                                        <span>@LucasKriebel - Very cool :) Nicklas, You have a new direct message.</span>
                                        </a>
                                        <div class="iq-email-date">11:49 am</div>
                                        </div>
                                        <ul class="iq-social-media">
                                        <li><a href="#"><i class="ri-delete-bin-2-line"></i></a></li>
                                        <li><a href="#"><i class="ri-mail-line"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <div class="email-app-details">
                                    <div class="iq-card">
                                        <div class="iq-card-body p-0">
                                        <div class="">
                                            <div class="iq-email-to-list p-3">
                                                <div class="d-flex justify-content-between">
                                                <ul>
                                                    <li class="mr-3">
                                                        <a href="javascript: void(0);">
                                                            <h4 class="m-0"><i class="ri-arrow-left-line"></i></h4>
                                                        </a>
                                                    </li>
                                                    <li data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><i class="ri-delete-bin-line"></i></a></li>
                                                    </ul>
                                                    <div class="iq-email-search d-flex">
                                                    <ul>
                                                        <li class="mr-3">
                                                            <a class="font-size-14" href="#">1 of 505</a>
                                                        </li>
                                                        <li data-toggle="tooltip" data-placement="top" title="Previous"><a href="#"><i class="ri-arrow-left-s-line"></i></a></li>
                                                        <li data-toggle="tooltip" data-placement="top" title="Next"><a href="#"><i class="ri-arrow-right-s-line"></i></a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-0">
                                            <div class="iq-inbox-subject p-3">
                                                <h5 class="mt-0">Your elite author Graphic Optimization reward is ready!</h5>
                                                <div class="iq-inbox-subject-info">
                                                    <div class="iq-subject-info">
                                                    <img src="../assets/images/user/blank.png" class="img-fluid rounded-circle" alt="#">
                                                    <div class="iq-subject-status align-self-center">
                                                        <h6 class="mb-0">ABC team <a href="dummy@gmail.com"><ddummy@gmail.com></a></h6>
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            to Me
                                                            </a>
                                                            <div class="dropdown-menu font-size-12" aria-labelledby="dropdownMenuButton">
                                                                <table class="iq-inbox-details">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>from:</td>
                                                                        <td>Medium Daily Digest</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>reply-to:</td>
                                                                        <td>noreply@gmail.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>to:</td>
                                                                        <td>iqonicdesigns@gmail.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>date:</td>
                                                                        <td>13 Dec 2019, 08:30</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>subject:</td>
                                                                        <td>The Golden Rule</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>security:</td>
                                                                        <td>Standard encryption</td>
                                                                    </tr>
                                                                </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="float-right align-self-center">Jan 25, 2029, 10:20AM</span>
                                                    </div>
                                                    <div class="iq-inbox-body mt-5">
                                                    <p>Hi Jopour Xiong,</p>
                                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
                                                    <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                                    <p class="mt-5 mb-0">Regards,<span class="d-inline-block w-100">John Deo</span></p>
                                                    </div>
                                                    <hr>
                                                    <div class="attegement">
                                                    <h6 class="mb-2">ATTACHED FILES:</h6>
                                                    <ul>
                                                        <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.doc</span>
                                                        </li>
                                                        <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.pdf</span>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                


                            
                            </ul>
                            </div>
                    
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-2 mail-box-detail"></div>
    </div>
    </div>

@endsection