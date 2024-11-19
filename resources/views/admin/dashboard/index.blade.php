@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between">
                            <div class="card-menu">
                                <span>Total Menus</span>
                                <h2 class="mb-0">683</h2>
                            </div>
                            <div class="icon-box icon-box-lg bg-primary-light">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 8.7773C0.00165391 10.5563 1.44323 11.9981 3.2222 12H8.7778C10.5568 11.9981 11.9983 10.5563 12 8.7773V3.2227C11.9983 1.44373 10.5568 0.00192952 8.7778 0H3.2222C1.44323 0.00192952 0.00165319 1.44373 0 3.2227V8.7773ZM2 3.2227C2.00072 2.54791 2.54741 2.00099 3.2222 2L8.7778 2C9.45259 2.00099 9.99928 2.54791 10 3.2227V8.7773C9.99929 9.45209 9.45259 9.99901 8.7778 10L3.2222 10C2.54741 9.99901 2.00072 9.45209 2 8.7773V3.2227Z"
                                        fill="var(--primary)" />
                                    <path
                                        d="M0 22.7773C0.00165272 24.5563 1.44323 25.9981 3.2222 26L8.7778 26C10.5568 25.9981 11.9983 24.5563 12 22.7773V17.2227C11.9983 15.4437 10.5568 14.0019 8.7778 14L3.2222 14C1.44323 14.0019 0.00165391 15.4437 0 17.2227V22.7773ZM2 17.2227C2.00072 16.5479 2.54741 16.001 3.2222 16H8.7778C9.45259 16.001 9.99928 16.5479 10 17.2227V22.7773C9.99929 23.4521 9.45259 23.999 8.7778 24L3.2222 24C2.54741 23.999 2.00071 23.4521 2 22.7773V17.2227Z"
                                        fill="var(--primary)" />
                                    <path
                                        d="M20 0C16.6863 0 14 2.68629 14 6C14 9.31371 16.6863 12 20 12C23.3137 12 26 9.31371 26 6C25.9964 2.6878 23.3122 0.00363779 20 0ZM20 10C17.7909 10 16 8.20914 16 6C16 3.79086 17.7909 2 20 2C22.2091 2 24 3.79086 24 6C23.9977 8.20818 22.2082 9.99769 20 10Z"
                                        fill="var(--primary)" />
                                    <path
                                        d="M17.2222 14C15.4432 14.0019 14.0017 15.4437 14 17.2227L14 22.7773C14.0017 24.5563 15.4432 25.9981 17.2222 26L22.7778 26C24.5568 25.9981 25.9984 24.5563 26 22.7773L26 17.2227C25.9983 15.4437 24.5568 14.0019 22.7778 14L17.2222 14ZM24 17.2227V22.7773C23.9993 23.4521 23.4526 23.999 22.7778 24L17.2222 24C16.5474 23.999 16.0007 23.4521 16 22.7773V17.2227C16.0007 16.5479 16.5474 16.001 17.2222 16H22.7778C23.4526 16.001 23.9993 16.5479 24 17.2227Z"
                                        fill="var(--primary)" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between">
                            <div class="card-menu">
                                <span>Total Revenue</span>
                                <h2 class="mb-0">$56,234</h2>
                            </div>
                            <div class="icon-box icon-box-lg bg-primary-light">
                                <svg width="26" height="30" viewBox="0 0 26 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.45 29.3C10.0102 29.3093 11.5568 29.0088 13 28.416C14.4417 29.0138 15.9893 29.3145 17.55 29.3C22.2885 29.3 26 26.7715 26 23.5422V18.1577C26 14.9284 22.2885 12.4 17.55 12.4C17.3303 12.4 17.1145 12.4104 16.9 12.4221V6.33285C16.9 3.16995 13.1885 0.699951 8.45 0.699951C3.7115 0.699951 0 3.16995 0 6.33285V23.6671C0 26.83 3.7115 29.3 8.45 29.3ZM23.4 23.5422C23.4 25.0359 20.9976 26.7 17.55 26.7C14.1024 26.7 11.7 25.0359 11.7 23.5422V22.3398C13.4605 23.4105 15.4899 23.9566 17.55 23.9141C19.6101 23.9566 21.6395 23.4105 23.4 22.3398V23.5422ZM17.55 15C20.9976 15 23.4 16.664 23.4 18.1577C23.4 19.6514 20.9976 21.3141 17.55 21.3141C14.1024 21.3141 11.7 19.6501 11.7 18.1577C11.7 16.6653 14.1024 15 17.55 15ZM8.45 3.29995C11.8976 3.29995 14.3 4.89895 14.3 6.33285C14.3 7.76675 11.8976 9.36705 8.45 9.36705C5.0024 9.36705 2.6 7.76805 2.6 6.33285C2.6 4.89765 5.0024 3.29995 8.45 3.29995ZM2.6 10.4266C4.36783 11.4764 6.39439 12.0101 8.45 11.967C10.5056 12.0101 12.5322 11.4764 14.3 10.4266L14.3 12.8289C12.8832 13.186 11.5839 13.9061 10.53 14.918C9.84648 15.066 9.14934 15.1418 8.45 15.1443C5.0024 15.1443 2.6 13.5453 2.6 12.1114V10.4266ZM2.6 16.2051C4.3682 17.2539 6.39459 17.787 8.45 17.7443C8.6814 17.7443 8.905 17.7157 9.1325 17.704C9.11313 17.8545 9.10228 18.0059 9.1 18.1576V20.8682C8.8816 20.8812 8.671 20.9228 8.45 20.9228C5.0024 20.9228 2.6 19.3238 2.6 17.8886V16.2051ZM2.6 21.9823C4.36783 23.0321 6.39439 23.5658 8.45 23.5228C8.6684 23.5228 8.8829 23.5058 9.1 23.4955V23.5422C9.1186 24.6489 9.54387 25.71 10.2947 26.5232C9.68645 26.638 9.06899 26.6972 8.45 26.7C5.0024 26.7 2.6 25.101 2.6 23.6671V21.9823Z"
                                        fill="var(--primary)" />
                                </svg>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between">
                            <div class="card-menu">
                                <span>Total Orders</span>
                                <h2 class="mb-0">4,982</h2>
                            </div>
                            <div class="icon-box icon-box-lg bg-primary-light">
                                <svg width="29" height="29" viewBox="0 0 29 29" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.5 24.5001H4.5V27.5001C4.5 27.8384 4.67123 28.1539 4.95504 28.3384C5.23903 28.5229 5.5969 28.5512 5.9062 28.4137L14.7118 24.5001H21.5C23.1561 24.4983 24.4982 23.1562 24.5 21.5001L24.5 13.5001C24.5 12.9478 24.0523 12.5001 23.5 12.5001C22.9477 12.5001 22.5 12.9478 22.5 13.5001V21.5001C22.4995 22.0522 22.0521 22.4996 21.5 22.5001L14.5 22.5001L14.4916 22.5018C14.4266 22.5083 14.3625 22.5212 14.3 22.5401C14.2324 22.5482 14.1658 22.5631 14.1012 22.5845L14.0934 22.5862L6.5 25.9615V23.5001C6.5 22.9478 6.05228 22.5001 5.5 22.5001H3.5C2.94792 22.4996 2.50049 22.0522 2.5 21.5001V7.50012C2.5005 6.94804 2.94792 6.50062 3.5 6.50012L15.42 6.50012C15.9723 6.50012 16.42 6.05241 16.42 5.50012C16.42 4.94784 15.9723 4.50012 15.42 4.50012H3.5C1.8439 4.50194 0.501819 5.84402 0.5 7.50012L0.5 21.5001C0.50182 23.1562 1.8439 24.4983 3.5 24.5001Z"
                                        fill="var(--primary)" />
                                    <path
                                        d="M23.5 10.5001C26.2614 10.5001 28.5 8.26155 28.5 5.50012C28.5 2.7387 26.2614 0.500122 23.5 0.500122C20.7386 0.500122 18.5 2.7387 18.5 5.50012C18.5033 8.2602 20.7399 10.4969 23.5 10.5001ZM23.5 2.50012C25.1569 2.50012 26.5 3.84327 26.5 5.50012C26.5 7.15698 25.1569 8.50012 23.5 8.50012C21.8431 8.50012 20.5 7.15698 20.5 5.50012C20.5018 3.84402 21.8439 2.50194 23.5 2.50012Z"
                                        fill="var(--primary)" />
                                    <path
                                        d="M5.5 10.5001H10.5C11.0523 10.5001 11.5 10.0524 11.5 9.50012C11.5 8.94784 11.0523 8.50012 10.5 8.50012H5.5C4.94772 8.50012 4.5 8.94784 4.5 9.50012C4.5 10.0524 4.94772 10.5001 5.5 10.5001Z"
                                        fill="var(--primary)" />
                                    <path
                                        d="M5.5 14.5001H14.5C15.0523 14.5001 15.5 14.0524 15.5 13.5001C15.5 12.9478 15.0523 12.5001 14.5 12.5001H5.5C4.94772 12.5001 4.5 12.9478 4.5 13.5001C4.5 14.0524 4.94772 14.5001 5.5 14.5001Z"
                                        fill="var(--primary)" />
                                </svg>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between">
                            <div class="card-menu">
                                <span>Total Customer</span>
                                <h2 class="mb-0">12,094</h2>
                            </div>
                            <div class="icon-box icon-box-lg bg-primary-light">
                                <svg width="29" height="28" viewBox="0 0 29 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.8413 15C14.0504 15 15.8413 13.2091 15.8413 11C15.8413 8.79086 14.0504 7 11.8413 7C9.63217 7 7.84131 8.79086 7.84131 11C7.84346 13.2082 9.63306 14.9979 11.8413 15ZM11.8413 9C12.9459 9 13.8413 9.89543 13.8413 11C13.8413 12.1046 12.9459 13 11.8413 13C10.7367 13 9.84131 12.1046 9.84131 11C9.8428 9.89605 10.7374 9.00149 11.8413 9Z"
                                        fill="#1921FA" />
                                    <path
                                        d="M27.4653 17.57C28.1349 16.6731 28.3336 15.5094 27.9995 14.4411L27.3647 12.3757C26.7526 10.3642 24.8938 8.99215 22.7913 9L18.3042 9C17.7519 9 17.3042 9.44772 17.3042 10C17.3042 10.5523 17.7519 11 18.3042 11H22.7913C24.0147 10.9958 25.0962 11.7943 25.4524 12.9648L26.0872 15.0293C26.2292 15.4911 26.1437 15.9929 25.8568 16.3816C25.5698 16.7703 25.1154 16.9998 24.6323 17L15.4634 17C15.4351 17 15.4114 17.0137 15.3834 17.0161C15.3162 17.0135 15.2513 17 15.1831 17H8.91306C6.63117 16.9917 4.61413 18.4815 3.95116 20.665L3.20456 23.09C2.85091 24.2408 3.0643 25.4912 3.77961 26.4597C4.49492 27.4281 5.6273 27.9997 6.83126 28H17.2642C18.4675 28 19.6001 27.4287 20.3157 26.4604C21.0315 25.4914 21.2449 24.2409 20.8913 23.09L20.1452 20.6652C19.9562 20.0614 19.6586 19.4971 19.2671 19H24.6323C25.7513 19.0052 26.8048 18.4733 27.4653 17.57ZM18.7075 25.2712C18.371 25.7315 17.8343 26.0025 17.2642 26L6.83126 26C6.26201 26 5.72636 25.7297 5.38805 25.2717C5.04968 24.8134 4.94894 24.222 5.11646 23.6777L5.86256 21.2529C6.2696 19.9104 7.50972 18.9944 8.91256 19H15.1826C16.5854 18.9944 17.8255 19.9104 18.2326 21.2529L18.9787 23.6777C19.1493 24.2217 19.0484 24.8143 18.7075 25.2712Z"
                                        fill="#1921FA" />
                                    <path
                                        d="M20.3413 7C22.2743 7 23.8413 5.433 23.8413 3.5C23.8413 1.567 22.2743 0 20.3413 0C18.4083 0 16.8413 1.567 16.8413 3.5C16.8436 5.43204 18.4093 6.99768 20.3413 7ZM20.3413 2C21.1697 2 21.8413 2.67157 21.8413 3.5C21.8413 4.32843 21.1697 5 20.3413 5C19.5129 5 18.8413 4.32843 18.8413 3.5C18.8422 2.67196 19.5133 2.00094 20.3413 2Z"
                                        fill="#1921FA" />
                                    <path
                                        d="M0.841309 4C0.841309 4.55228 1.28902 5 1.84131 5H3.84131V7C3.84131 7.55229 4.28902 8 4.84131 8C5.39359 8 5.84131 7.55228 5.84131 7V5H7.84131C8.39359 5 8.84131 4.55228 8.84131 4C8.84131 3.44772 8.39359 3 7.84131 3H5.84131V1C5.84131 0.447715 5.39359 0 4.84131 0C4.28902 0 3.84131 0.447715 3.84131 1V3H1.84131C1.28902 3 0.841308 3.44772 0.841309 4Z"
                                        fill="#1921FA" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-xl-6 custome-width">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h3 class="h-title">Revenue</h3>

                                <ul class="revnue-tab nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home-tab-pane" type="button" role="tab"
                                            aria-controls="home-tab-pane" aria-selected="true">Daily</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                                            aria-controls="profile-tab-pane" aria-selected="false">Weekly</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#contact-tab-pane" type="button" role="tab"
                                            aria-controls="contact-tab-pane" aria-selected="false">Monthly</button>
                                    </li>
                                </ul>

                            </div>
                            <div class="card-body pb-0">
                                <div class=" d-flex flex-wrap">
                                    <span class="d-flex align-items-center me-2">
                                        <svg class="me-2" width="14" height="14" viewBox="0 0 14 14"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="0.108032" y="0.5" width="13" height="13" rx="4"
                                                fill="#1921FA" />
                                        </svg>
                                        Income
                                        <h5 class="mb-0 mx-2">$23,445</h5>
                                        <span class="text-success ">+0.4%</span>
                                    </span>
                                    <span class="application d-flex align-items-center ms-me-5 ms-0">
                                        <svg class="me-2" width="14" height="14" viewBox="0 0 14 14"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="0.108032" y="0.5" width="13" height="13" rx="4"
                                                fill="#FF3D3D" />
                                        </svg>
                                        Expense
                                        <h5 class="mb-0 mx-2">$8,345</h5>
                                        <span class="text-danger ">+0.4%</span>
                                    </span>
                                </div>
                                <div id="activityz"></div>
                            </div>
                        </div>
                    </div>
                <div class="col-xl-6 custome-width">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h3 class="h-title">Order Summary</h3>
                            <div>
                                <select class="default-select h-select" aria-label="Default select example">
                                    <option selected>Week</option>
                                    <option value="1">Month</option>
                                    <option value="2">Daily</option>

                                </select>
                                <div class="dropdown custom-dropdown mb-0">
                                    <div class="btn sharp tp-btn dark-btn" data-bs-toggle="dropdown">
                                        <svg width="5" height="18" viewBox="0 0 5 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="2.25748" cy="2.19083" r="1.92398" fill="#1921FA" />
                                            <circle cx="2.25748" cy="8.92471" r="1.92398" fill="#1921FA" />
                                            <circle cx="2.25748" cy="15.6585" r="1.92398" fill="#1921FA" />
                                        </svg>

                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                        <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <p style="width:90%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor
                                sit amet, consectetur adipiscing elit.dolor sit amet, consectetur adipiscing elit</p>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div id="piechart"></div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="mb-4">
                                        <div class="progress">
                                            <div class="progress-bar linear" style="width: 40%; height:13px;"
                                                role="progressbar">
                                                <span class="sr-only">60% Complete</span>
                                            </div>

                                        </div>
                                        <span class="d-flex align-items-center mt-2">
                                            <span>
                                                <svg width="13" height="14" viewBox="0 0 13 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect y="0.420288" width="13" height="13" rx="4"
                                                        fill="#3B42F0" />
                                                </svg>
                                                <span class="mb-0  text-dark">On Delivery</span>
                                            </span>
                                            <span class="ms-auto font-w600">$6,245</span>
                                        </span>
                                    </div>
                                    <div class="mb-4">
                                        <div class="progress">
                                            <div class="progress-bar linear bg-success" style="width: 60%; height:13px;"
                                                role="progressbar">
                                                <span class="sr-only">60% Complete</span>
                                            </div>

                                        </div>
                                        <span class="d-flex align-items-center mt-2">
                                            <span>
                                                <svg width="13" height="14" viewBox="0 0 13 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect y="0.420288" width="13" height="13" rx="4"
                                                        fill="#4FD66E" />
                                                </svg>

                                                <span class="mb-0  text-dark">Delivered</span>
                                            </span>
                                            <span class="ms-auto font-w600">$2,355</span>
                                        </span>
                                    </div>
                                    <div>
                                        <div class="progress">
                                            <div class="progress-bar linear bg-warning" style="width: 30%; height:13px;"
                                                role="progressbar">
                                                <span class="sr-only">60% Complete</span>
                                            </div>

                                        </div>
                                        <span class="d-flex align-items-center mt-2">
                                            <span>
                                                <svg width="13" height="14" viewBox="0 0 13 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect y="0.420288" width="13" height="13" rx="4"
                                                        fill="#FF8D0E" />
                                                </svg>

                                                <span class="mb-0  text-dark">Candeled</span>
                                            </span>
                                            <span class="ms-auto font-w600">$9,456</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="card h-auto">
                        <div class="card-header border-0 pb-0 flex-wrap">
                            <div class="d-flex flex-wrap">
                                <h3 class="h-title mb-0 me-4">Customer Map</h3>
                                <div class="form-check form-switch mx-3">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Customer</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault1">
                                    <label class="form-check-label" for="flexSwitchCheckDefault1">Location</label>
                                </div>
                            </div>
                            <div>
                                <a href="javascript:void(0);" class="btn btn-primary me-1"><svg width="14"
                                        height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14 13.125C14 13.6082 13.6082 14 13.125 14H0.875C0.391754 14 0 13.6082 0 13.125C0 12.6418 0.391754 12.25 0.875 12.25H13.125C13.6082 12.25 14 12.6418 14 13.125ZM6.38129 10.3531C6.55216 10.524 6.77605 10.6094 7 10.6094C7.22389 10.6094 7.44789 10.524 7.61871 10.3531L10.7189 7.25296C11.0606 6.91124 11.0606 6.35723 10.7189 6.01552C10.3772 5.6738 9.82316 5.6738 9.48144 6.01552L7.875 7.62196V0.875C7.875 0.391754 7.48324 0 7 0C6.51675 0 6.125 0.391754 6.125 0.875V7.62196L4.51855 6.01552C4.17684 5.6738 3.62283 5.6738 3.28111 6.01552C2.9394 6.35723 2.9394 6.91124 3.28111 7.25296L6.38129 10.3531Z"
                                            fill="white" />
                                    </svg>
                                    Save Report</a>
                                <select class="default-select h-select ms-1" aria-label="Default select example">
                                    <option selected>Week</option>
                                    <option value="1">Month</option>
                                    <option value="2">Daily</option>

                                </select>
                                <div class="dropdown custom-dropdown mb-0">
                                    <div class="btn sharp tp-btn dark-btn" data-bs-toggle="dropdown">
                                        <svg width="5" height="18" viewBox="0 0 5 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="2.25748" cy="2.19083" r="1.92398" fill="#1921FA" />
                                            <circle cx="2.25748" cy="8.92471" r="1.92398" fill="#1921FA" />
                                            <circle cx="2.25748" cy="15.6585" r="1.92398" fill="#1921FA" />
                                        </svg>

                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                        <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="dz-scroll" style="height:306px;">
                                        <div class="d-flex customer-map-list">
                                            <div class="icon-bx bg-primary-light">
                                                <svg width="30" height="35" viewBox="0 0 30 35" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.9106 11.0599C12.0443 11.0599 9.71212 13.3901 9.70862 16.2556H20.1127C20.1091 13.3901 17.7769 11.0599 14.9106 11.0599Z"
                                                        fill="var(--primary)" />
                                                    <path
                                                        d="M14.9107 0.726442C7.1031 0.726442 0.751099 7.07845 0.751099 14.886C0.751099 17.9904 1.73728 20.9375 3.60293 23.4087C5.32766 25.6933 7.74746 27.4287 10.4499 28.3272L14.0532 34.3499C14.2336 34.6516 14.5593 34.8362 14.9107 34.8362C15.2621 34.8362 15.5878 34.6516 15.7682 34.3499L19.3716 28.3272C22.0739 27.4287 24.4938 25.6933 26.2185 23.4087C28.0841 20.9375 29.0703 17.9904 29.0703 14.886C29.0703 7.07845 22.7183 0.726442 14.9107 0.726442ZM22.5437 18.2542H7.27772C6.72584 18.2542 6.27841 17.8068 6.27841 17.2549C6.27841 16.703 6.72584 16.2556 7.27772 16.2556H7.71002C7.71328 12.627 10.4144 9.61869 13.9115 9.13096V9.00778C13.9115 8.45589 14.3589 8.00847 14.9108 8.00847C15.4627 8.00847 15.9101 8.45589 15.9101 9.00778V9.13096C19.4072 9.61862 22.1083 12.627 22.1115 16.2556H22.5438C23.0957 16.2556 23.5431 16.703 23.5431 17.2549C23.5431 17.8068 23.0956 18.2542 22.5437 18.2542Z"
                                                        fill="var(--primary)" />
                                                </svg>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">Washington Franklin </h6>
                                                <p class="mb-0">28 Customers</p>
                                            </div>
                                        </div>
                                        <div class="d-flex customer-map-list">
                                            <div class="icon-bx bg-secondary-light">
                                                <svg width="30" height="35" viewBox="0 0 30 35" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.9106 11.0599C12.0443 11.0599 9.71212 13.3901 9.70862 16.2556H20.1127C20.1091 13.3901 17.7769 11.0599 14.9106 11.0599Z"
                                                        fill="var(--secondary)" />
                                                    <path
                                                        d="M14.9107 0.726442C7.1031 0.726442 0.751099 7.07845 0.751099 14.886C0.751099 17.9904 1.73728 20.9375 3.60293 23.4087C5.32766 25.6933 7.74746 27.4287 10.4499 28.3272L14.0532 34.3499C14.2336 34.6516 14.5593 34.8362 14.9107 34.8362C15.2621 34.8362 15.5878 34.6516 15.7682 34.3499L19.3716 28.3272C22.0739 27.4287 24.4938 25.6933 26.2185 23.4087C28.0841 20.9375 29.0703 17.9904 29.0703 14.886C29.0703 7.07845 22.7183 0.726442 14.9107 0.726442ZM22.5437 18.2542H7.27772C6.72584 18.2542 6.27841 17.8068 6.27841 17.2549C6.27841 16.703 6.72584 16.2556 7.27772 16.2556H7.71002C7.71328 12.627 10.4144 9.61869 13.9115 9.13096V9.00778C13.9115 8.45589 14.3589 8.00847 14.9108 8.00847C15.4627 8.00847 15.9101 8.45589 15.9101 9.00778V9.13096C19.4072 9.61862 22.1083 12.627 22.1115 16.2556H22.5438C23.0957 16.2556 23.5431 16.703 23.5431 17.2549C23.5431 17.8068 23.0956 18.2542 22.5437 18.2542Z"
                                                        fill="var(--secondary)" />
                                                </svg>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">Franklin Avenue </h6>
                                                <p class="mb-0">28 Customers</p>
                                            </div>
                                        </div>
                                        <div class="d-flex customer-map-list">
                                            <div class="icon-bx bg-success-light">
                                                <svg width="30" height="35" viewBox="0 0 30 35" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.9106 11.0599C12.0443 11.0599 9.71212 13.3901 9.70862 16.2556H20.1127C20.1091 13.3901 17.7769 11.0599 14.9106 11.0599Z"
                                                        fill="#3CD860" />
                                                    <path
                                                        d="M14.9107 0.726442C7.1031 0.726442 0.751099 7.07845 0.751099 14.886C0.751099 17.9904 1.73728 20.9375 3.60293 23.4087C5.32766 25.6933 7.74746 27.4287 10.4499 28.3272L14.0532 34.3499C14.2336 34.6516 14.5593 34.8362 14.9107 34.8362C15.2621 34.8362 15.5878 34.6516 15.7682 34.3499L19.3716 28.3272C22.0739 27.4287 24.4938 25.6933 26.2185 23.4087C28.0841 20.9375 29.0703 17.9904 29.0703 14.886C29.0703 7.07845 22.7183 0.726442 14.9107 0.726442ZM22.5437 18.2542H7.27772C6.72584 18.2542 6.27841 17.8068 6.27841 17.2549C6.27841 16.703 6.72584 16.2556 7.27772 16.2556H7.71002C7.71328 12.627 10.4144 9.61869 13.9115 9.13096V9.00778C13.9115 8.45589 14.3589 8.00847 14.9108 8.00847C15.4627 8.00847 15.9101 8.45589 15.9101 9.00778V9.13096C19.4072 9.61862 22.1083 12.627 22.1115 16.2556H22.5438C23.0957 16.2556 23.5431 16.703 23.5431 17.2549C23.5431 17.8068 23.0956 18.2542 22.5437 18.2542Z"
                                                        fill="#3CD860" />
                                                </svg>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">Arlington Avenue </h6>
                                                <p class="mb-0">28 Customers</p>
                                            </div>
                                        </div>
                                        <div class="d-flex  customer-map-list">
                                            <div class="icon-bx bg-info-light">
                                                <svg width="30" height="35" viewBox="0 0 30 35" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.9106 11.0599C12.0443 11.0599 9.71212 13.3901 9.70862 16.2556H20.1127C20.1091 13.3901 17.7769 11.0599 14.9106 11.0599Z"
                                                        fill="#6E6E6E" />
                                                    <path
                                                        d="M14.9107 0.726442C7.1031 0.726442 0.751099 7.07845 0.751099 14.886C0.751099 17.9904 1.73728 20.9375 3.60293 23.4087C5.32766 25.6933 7.74746 27.4287 10.4499 28.3272L14.0532 34.3499C14.2336 34.6516 14.5593 34.8362 14.9107 34.8362C15.2621 34.8362 15.5878 34.6516 15.7682 34.3499L19.3716 28.3272C22.0739 27.4287 24.4938 25.6933 26.2185 23.4087C28.0841 20.9375 29.0703 17.9904 29.0703 14.886C29.0703 7.07845 22.7183 0.726442 14.9107 0.726442ZM22.5437 18.2542H7.27772C6.72584 18.2542 6.27841 17.8068 6.27841 17.2549C6.27841 16.703 6.72584 16.2556 7.27772 16.2556H7.71002C7.71328 12.627 10.4144 9.61869 13.9115 9.13096V9.00778C13.9115 8.45589 14.3589 8.00847 14.9108 8.00847C15.4627 8.00847 15.9101 8.45589 15.9101 9.00778V9.13096C19.4072 9.61862 22.1083 12.627 22.1115 16.2556H22.5438C23.0957 16.2556 23.5431 16.703 23.5431 17.2549C23.5431 17.8068 23.0956 18.2542 22.5437 18.2542Z"
                                                        fill="#6E6E6E" />
                                                </svg>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">Lebanon Avenue </h6>
                                                <p class="mb-0">28 Customers</p>
                                            </div>
                                        </div>
                                        <div class="d-flex  customer-map-list">
                                            <div class="icon-bx bg-light light">
                                                <svg width="30" height="35" viewBox="0 0 30 35" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.9106 11.0599C12.0443 11.0599 9.71212 13.3901 9.70862 16.2556H20.1127C20.1091 13.3901 17.7769 11.0599 14.9106 11.0599Z"
                                                        fill="#6E6E6E" />
                                                    <path
                                                        d="M14.9107 0.726442C7.1031 0.726442 0.751099 7.07845 0.751099 14.886C0.751099 17.9904 1.73728 20.9375 3.60293 23.4087C5.32766 25.6933 7.74746 27.4287 10.4499 28.3272L14.0532 34.3499C14.2336 34.6516 14.5593 34.8362 14.9107 34.8362C15.2621 34.8362 15.5878 34.6516 15.7682 34.3499L19.3716 28.3272C22.0739 27.4287 24.4938 25.6933 26.2185 23.4087C28.0841 20.9375 29.0703 17.9904 29.0703 14.886C29.0703 7.07845 22.7183 0.726442 14.9107 0.726442ZM22.5437 18.2542H7.27772C6.72584 18.2542 6.27841 17.8068 6.27841 17.2549C6.27841 16.703 6.72584 16.2556 7.27772 16.2556H7.71002C7.71328 12.627 10.4144 9.61869 13.9115 9.13096V9.00778C13.9115 8.45589 14.3589 8.00847 14.9108 8.00847C15.4627 8.00847 15.9101 8.45589 15.9101 9.00778V9.13096C19.4072 9.61862 22.1083 12.627 22.1115 16.2556H22.5438C23.0957 16.2556 23.5431 16.703 23.5431 17.2549C23.5431 17.8068 23.0956 18.2542 22.5437 18.2542Z"
                                                        fill="#6E6E6E" />
                                                </svg>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">Springfield Avenue </h6>
                                                <p class="mb-0">28 Customers</p>
                                            </div>
                                        </div>
                                        <div class="d-flex customer-map-list">
                                            <div class="icon-bx bg-light light">
                                                <svg width="30" height="35" viewBox="0 0 30 35" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.9106 11.0599C12.0443 11.0599 9.71212 13.3901 9.70862 16.2556H20.1127C20.1091 13.3901 17.7769 11.0599 14.9106 11.0599Z"
                                                        fill="#6E6E6E" />
                                                    <path
                                                        d="M14.9107 0.726442C7.1031 0.726442 0.751099 7.07845 0.751099 14.886C0.751099 17.9904 1.73728 20.9375 3.60293 23.4087C5.32766 25.6933 7.74746 27.4287 10.4499 28.3272L14.0532 34.3499C14.2336 34.6516 14.5593 34.8362 14.9107 34.8362C15.2621 34.8362 15.5878 34.6516 15.7682 34.3499L19.3716 28.3272C22.0739 27.4287 24.4938 25.6933 26.2185 23.4087C28.0841 20.9375 29.0703 17.9904 29.0703 14.886C29.0703 7.07845 22.7183 0.726442 14.9107 0.726442ZM22.5437 18.2542H7.27772C6.72584 18.2542 6.27841 17.8068 6.27841 17.2549C6.27841 16.703 6.72584 16.2556 7.27772 16.2556H7.71002C7.71328 12.627 10.4144 9.61869 13.9115 9.13096V9.00778C13.9115 8.45589 14.3589 8.00847 14.9108 8.00847C15.4627 8.00847 15.9101 8.45589 15.9101 9.00778V9.13096C19.4072 9.61862 22.1083 12.627 22.1115 16.2556H22.5438C23.0957 16.2556 23.5431 16.703 23.5431 17.2549C23.5431 17.8068 23.0956 18.2542 22.5437 18.2542Z"
                                                        fill="#6E6E6E" />
                                                </svg>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">South Franklin Avenue </h6>
                                                <p class="mb-0">28 Customers</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="map-wrapper">
                                        <div id="smallimap">
                                        </div>
                                        <div class="all-locations">
                                            <div class="">
                                                <svg class="location1" width="30" height="35" viewBox="0 0 30 35"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.9106 11.0599C12.0443 11.0599 9.71212 13.3901 9.70862 16.2556H20.1127C20.1091 13.3901 17.7769 11.0599 14.9106 11.0599Z"
                                                        fill="#6E6E6E" />
                                                    <path
                                                        d="M14.9107 0.726442C7.1031 0.726442 0.751099 7.07845 0.751099 14.886C0.751099 17.9904 1.73728 20.9375 3.60293 23.4087C5.32766 25.6933 7.74746 27.4287 10.4499 28.3272L14.0532 34.3499C14.2336 34.6516 14.5593 34.8362 14.9107 34.8362C15.2621 34.8362 15.5878 34.6516 15.7682 34.3499L19.3716 28.3272C22.0739 27.4287 24.4938 25.6933 26.2185 23.4087C28.0841 20.9375 29.0703 17.9904 29.0703 14.886C29.0703 7.07845 22.7183 0.726442 14.9107 0.726442ZM22.5437 18.2542H7.27772C6.72584 18.2542 6.27841 17.8068 6.27841 17.2549C6.27841 16.703 6.72584 16.2556 7.27772 16.2556H7.71002C7.71328 12.627 10.4144 9.61869 13.9115 9.13096V9.00778C13.9115 8.45589 14.3589 8.00847 14.9108 8.00847C15.4627 8.00847 15.9101 8.45589 15.9101 9.00778V9.13096C19.4072 9.61862 22.1083 12.627 22.1115 16.2556H22.5438C23.0957 16.2556 23.5431 16.703 23.5431 17.2549C23.5431 17.8068 23.0956 18.2542 22.5437 18.2542Z"
                                                        fill="#6E6E6E" />
                                                </svg>
                                            </div>
                                            <div class="onlive">
                                                <svg class="location2" width="30" height="35" viewBox="0 0 30 35"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.9106 11.0599C12.0443 11.0599 9.71212 13.3901 9.70862 16.2556H20.1127C20.1091 13.3901 17.7769 11.0599 14.9106 11.0599Z"
                                                        fill="var(--secondary)"></path>
                                                    <path
                                                        d="M14.9107 0.726442C7.1031 0.726442 0.751099 7.07845 0.751099 14.886C0.751099 17.9904 1.73728 20.9375 3.60293 23.4087C5.32766 25.6933 7.74746 27.4287 10.4499 28.3272L14.0532 34.3499C14.2336 34.6516 14.5593 34.8362 14.9107 34.8362C15.2621 34.8362 15.5878 34.6516 15.7682 34.3499L19.3716 28.3272C22.0739 27.4287 24.4938 25.6933 26.2185 23.4087C28.0841 20.9375 29.0703 17.9904 29.0703 14.886C29.0703 7.07845 22.7183 0.726442 14.9107 0.726442ZM22.5437 18.2542H7.27772C6.72584 18.2542 6.27841 17.8068 6.27841 17.2549C6.27841 16.703 6.72584 16.2556 7.27772 16.2556H7.71002C7.71328 12.627 10.4144 9.61869 13.9115 9.13096V9.00778C13.9115 8.45589 14.3589 8.00847 14.9108 8.00847C15.4627 8.00847 15.9101 8.45589 15.9101 9.00778V9.13096C19.4072 9.61862 22.1083 12.627 22.1115 16.2556H22.5438C23.0957 16.2556 23.5431 16.703 23.5431 17.2549C23.5431 17.8068 23.0956 18.2542 22.5437 18.2542Z"
                                                        fill="var(--secondary)"></path>
                                                </svg>
                                            </div>
                                            <div class="onlive2">
                                                <svg class="location3" width="30" height="35" viewBox="0 0 30 35"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.9106 11.0599C12.0443 11.0599 9.71212 13.3901 9.70862 16.2556H20.1127C20.1091 13.3901 17.7769 11.0599 14.9106 11.0599Z"
                                                        fill="var(--primary)"></path>
                                                    <path
                                                        d="M14.9107 0.726442C7.1031 0.726442 0.751099 7.07845 0.751099 14.886C0.751099 17.9904 1.73728 20.9375 3.60293 23.4087C5.32766 25.6933 7.74746 27.4287 10.4499 28.3272L14.0532 34.3499C14.2336 34.6516 14.5593 34.8362 14.9107 34.8362C15.2621 34.8362 15.5878 34.6516 15.7682 34.3499L19.3716 28.3272C22.0739 27.4287 24.4938 25.6933 26.2185 23.4087C28.0841 20.9375 29.0703 17.9904 29.0703 14.886C29.0703 7.07845 22.7183 0.726442 14.9107 0.726442ZM22.5437 18.2542H7.27772C6.72584 18.2542 6.27841 17.8068 6.27841 17.2549C6.27841 16.703 6.72584 16.2556 7.27772 16.2556H7.71002C7.71328 12.627 10.4144 9.61869 13.9115 9.13096V9.00778C13.9115 8.45589 14.3589 8.00847 14.9108 8.00847C15.4627 8.00847 15.9101 8.45589 15.9101 9.00778V9.13096C19.4072 9.61862 22.1083 12.627 22.1115 16.2556H22.5438C23.0957 16.2556 23.5431 16.703 23.5431 17.2549C23.5431 17.8068 23.0956 18.2542 22.5437 18.2542Z"
                                                        fill="var(--primary)"></path>
                                                </svg>
                                            </div>
                                            <svg class="location4" width="30" height="35" viewBox="0 0 30 35"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.9106 11.0599C12.0443 11.0599 9.71212 13.3901 9.70862 16.2556H20.1127C20.1091 13.3901 17.7769 11.0599 14.9106 11.0599Z"
                                                    fill="#3CD860"></path>
                                                <path
                                                    d="M14.9107 0.726442C7.1031 0.726442 0.751099 7.07845 0.751099 14.886C0.751099 17.9904 1.73728 20.9375 3.60293 23.4087C5.32766 25.6933 7.74746 27.4287 10.4499 28.3272L14.0532 34.3499C14.2336 34.6516 14.5593 34.8362 14.9107 34.8362C15.2621 34.8362 15.5878 34.6516 15.7682 34.3499L19.3716 28.3272C22.0739 27.4287 24.4938 25.6933 26.2185 23.4087C28.0841 20.9375 29.0703 17.9904 29.0703 14.886C29.0703 7.07845 22.7183 0.726442 14.9107 0.726442ZM22.5437 18.2542H7.27772C6.72584 18.2542 6.27841 17.8068 6.27841 17.2549C6.27841 16.703 6.72584 16.2556 7.27772 16.2556H7.71002C7.71328 12.627 10.4144 9.61869 13.9115 9.13096V9.00778C13.9115 8.45589 14.3589 8.00847 14.9108 8.00847C15.4627 8.00847 15.9101 8.45589 15.9101 9.00778V9.13096C19.4072 9.61862 22.1083 12.627 22.1115 16.2556H22.5438C23.0957 16.2556 23.5431 16.703 23.5431 17.2549C23.5431 17.8068 23.0956 18.2542 22.5437 18.2542Z"
                                                    fill="#3CD860"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h3 class="h-title">Recent Customer</h3>
                            <div class="dropdown custom-dropdown mb-0">
                                <div class="btn sharp tp-btn dark-btn" data-bs-toggle="dropdown">
                                    <svg width="5" height="18" viewBox="0 0 5 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="2.25748" cy="2.19083" r="1.92398" fill="#1921FA" />
                                        <circle cx="2.25748" cy="8.92471" r="1.92398" fill="#1921FA" />
                                        <circle cx="2.25748" cy="15.6585" r="1.92398" fill="#1921FA" />
                                    </svg>

                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                    <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-0">
                            <div class="dz-scroll recent-customer">
                                <ul class="d-flex custome-list">
                                    <li>
                                        <img src="{{ asset('assets/admin/images/coustomer-img/1.jpg') }}" class="avatar"
                                            alt="">
                                    </li>
                                    <li class="ms-2">
                                        <h6 class="mb-0"><a href="javascript:void(0);">James Sukardi</a></h6>
                                        <p class="mb-0">Alexandria St. London Park</p>
                                    </li>
                                </ul>
                                <ul class="d-flex custome-list">
                                    <li>
                                        <img src="{{ asset('assets/admin/images/coustomer-img/2.jpg') }}" class="avatar"
                                            alt="">
                                    </li>
                                    <li class="ms-2">
                                        <h6 class="mb-0"><a href="javascript:void(0);">Melanie Subarjo</a></h6>
                                        <p class="mb-0">Alexandria St. London Park</p>
                                    </li>
                                </ul>
                                <ul class="d-flex custome-list">
                                    <li>
                                        <img src="{{ asset('assets/admin/images/coustomer-img/3.jpg') }}" class="avatar"
                                            alt="">
                                    </li>
                                    <li class="ms-2">
                                        <h6 class="mb-0"><a href="javascript:void(0);">Kevin Sandjaja</a></h6>
                                        <p class="mb-0">Alexandria St. London Park</p>
                                    </li>
                                </ul>
                                <ul class="d-flex custome-list">
                                    <li>
                                        <img src="{{ asset('assets/admin/images/coustomer-img/4.jpg') }}" class="avatar"
                                            alt="">
                                    </li>
                                    <li class="ms-2">
                                        <h6 class="mb-0"><a href="javascript:void(0);">James Sukardi</a></h6>
                                        <p class="mb-0">Alexandria St. London Park</p>
                                    </li>
                                </ul>
                                <ul class="d-flex custome-list">
                                    <li>
                                        <img src="{{ asset('assets/admin/images/coustomer-img/1.jpg') }}" class="avatar"
                                            alt="">
                                    </li>
                                    <li class="ms-2">
                                        <h6 class="mb-0"><a href="javascript:void(0);">James Sukardi</a></h6>
                                        <p class="mb-0">Alexandria St. London Park</p>
                                    </li>
                                </ul>
                                <ul class="d-flex custome-list">
                                    <li>
                                        <img src="{{ asset('assets/admin/images/coustomer-img/2.jpg') }}" class="avatar"
                                            alt="">
                                    </li>
                                    <li class="ms-2">
                                        <h6 class="mb-0"><a href="javascript:void(0);">James Sukardi</a></h6>
                                        <p class="mb-0">Alexandria St. London Park</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer pt-0 border-0">
                            <!-- <a href="javascript:void(0);" class="btn btn-primary btn-block my-2"></a> -->
                            <button type="button" class="btn btn-primary btn-block mb-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModal1">
                                + New Customer
                            </button>
                            <a href="app-profile-2.html" class="text-primary font-w600 text-center d-block">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <!-- Required vendors -->
        <script src="{{ asset('assets/admin/vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/chart.js/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/apexchart/apexchart.js') }}"></script>

        <!-- Dashboard 1 -->
        <script src="{{ asset('assets/admin/js/dashboard/dashboard-1.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/swiper/js/swiper-bundle.min.js') }}"></script>


        <!-- JS for dotted map -->
        <script src="{{ asset('assets/admin/vendor/dotted-map/js/contrib/jquery.smallipop-0.3.0.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/dotted-map/js/contrib/suntimes.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/dotted-map/js/contrib/color-0.4.1.js') }}"></script>

        <script src="{{ asset('assets/admin/vendor/dotted-map/js/world.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/dotted-map/js/smallimap.js') }}"></script>
        <script src="{{ asset('assets/admin/js/dashboard/dotted-map-init.js') }}"></script>

        <!-- Vectormap -->
        <script src="{{ asset('assets/admin/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/jqvmap/js/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
        <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
        <script src="{{ asset('assets/admin/js/deznav-init.js') }}"></script>
        <script src="{{ asset('assets/admin/js/demo.js') }}"></script>
        <script src="{{ asset('assets/admin/js/styleSwitcher.js') }}"></script>
    @endpush
@endsection
