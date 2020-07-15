<header class="header">

   <div class="header-top">
         <div class="container">

            <div class="header-right">
               <div class="header-dropdown dropdown-expanded">
                     <a href="#">Links</a>
                     <div class="header-menu">
                        <ul>
                           <li><a href="my-account.html">MY ACCOUNT </a></li>
                           <li><a href="#">MY WISHLIST </a></li>
                           <li><a href="blog.html">BLOG</a></li>
                           <li><a href="contact.html">Contact</a></li>
                           <li><a href="#" class="login-link">LOG IN</a></li>
                        </ul>
                     </div><!-- End .header-menu -->
               </div><!-- End .header-dropown -->
            </div><!-- End .header-right -->
         </div><!-- End .container -->
   </div><!-- End .header-top -->

   <div class="header-middle">
         <div class="container">
            <div class="header-left">
               <a href="{{route('home')}}" class="brand">
                     DigiShop
               </a>
            </div><!-- End .header-left -->

            <div class="header-center">
               <div class="header-search">
                     <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                     <form action="#" method="get">
                        <div class="header-search-wrapper">
                           <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                           <div class="select-custom">
                                 <select id="cat" name="cat">
                                    <option value="">All Categories</option>
                                    <option value="4">Fashion</option>
                                    <option value="12">- Women</option>
                                    <option value="13">- Men</option>
                                    <option value="66">- Jewellery</option>
                                    <option value="67">- Kids Fashion</option>
                                    <option value="5">Electronics</option>
                                    <option value="21">- Smart TVs</option>
                                    <option value="22">- Cameras</option>
                                    <option value="63">- Games</option>
                                    <option value="7">Home &amp; Garden</option>
                                    <option value="11">Motors</option>
                                    <option value="31">- Cars and Trucks</option>
                                    <option value="32">- Motorcycles &amp; Powersports</option>
                                    <option value="33">- Parts &amp; Accessories</option>
                                    <option value="34">- Boats</option>
                                    <option value="57">- Auto Tools &amp; Supplies</option>
                                 </select>
                           </div><!-- End .select-custom -->
                           <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                        </div><!-- End .header-search-wrapper -->
                     </form>
               </div><!-- End .header-search -->
            </div><!-- End .headeer-center -->

            <div class="header-right">
               <button class="mobile-menu-toggler" type="button">
                     <i class="icon-menu"></i>
               </button>
               <div class="header-contact">
                     <span>Call us now</span>
                     <a href="tel:#"><strong>+91 9712340450</strong></a>
               </div><!-- End .header-contact -->

               <div class="dropdown cart-dropdown">
                     <a href="{{route('cart')}}" class="dropdown-toggle" role="button">
                        <span class="cart-count">{{Cart::session(auth()->id())->getContent()->count()}}</span>
                     </a>


               </div><!-- End .dropdown -->
            </div><!-- End .header-right -->
         </div><!-- End .container -->
   </div><!-- End .header-middle -->

   <div class="header-bottom sticky-header">
         <div class="container">
            <nav class="main-nav">
               <ul class="menu sf-arrows">
                     <li><a href="{{route('home')}}">Home</a></li>
                     <li>
                        <a href="category.html" class="sf-with-ul">Categories</a>
                        <div class="megamenu megamenu-fixed-width">
                           <div class="row">
                                 <div class="col-lg-8">
                                    <div class="row">
                                       <div class="col-lg-6">
                                             <div class="menu-title">
                                                <a href="#">Variations 1<span class="tip tip-new">New!</span></a>
                                             </div>
                                             <ul>
                                                <li><a href="category.html">Fullwidth Banner<span class="tip tip-hot">Hot!</span></a></li>
                                                <li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
                                                <li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
                                                <li><a href="category.html">Left Sidebar</a></li>
                                                <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                                                <li><a href="category-flex-grid.html">Product Flex Grid</a></li>
                                                <li><a href="category-horizontal-filter1.html">Horizontal Filter1</a></li>
                                                <li><a href="category-horizontal-filter2.html">Horizontal Filter2</a></li>
                                             </ul>
                                       </div><!-- End .col-lg-6 -->
                                       <div class="col-lg-6">
                                             <div class="menu-title">
                                                <a href="#">Variations 2</a>
                                             </div>
                                             <ul>
                                                <li><a href="#">Product List Item Types</a></li>
                                                <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll</a></li>
                                                <li><a href="category.html">3 Columns Products</a></li>
                                                <li><a href="category-4col.html">4 Columns Products <span class="tip tip-new">New</span></a></li>
                                                <li><a href="category-5col.html">5 Columns Products</a></li>
                                                <li><a href="category-6col.html">6 Columns Products</a></li>
                                                <li><a href="category-7col.html">7 Columns Products</a></li>
                                                <li><a href="category-8col.html">8 Columns Products</a></li>
                                             </ul>
                                       </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                 </div><!-- End .col-lg-8 -->
                                 <div class="col-lg-4">
                                    <div class="banner">
                                       <a href="#">
                                             <img src="{{asset('public/themes/digishop/images/menu-banner-2.jpg')}}" alt="Menu banner">
                                       </a>
                                    </div><!-- End .banner -->
                                 </div><!-- End .col-lg-4 -->
                           </div>
                        </div><!-- End .megamenu -->
                     </li>
                     <li class="megamenu-container active">
                        <a href="product.html" class="sf-with-ul">Products</a>
                        <div class="megamenu">
                           <div class="row">
                                 <div class="col-lg-8">
                                    <div class="row">
                                       <div class="col-lg-4">
                                             <div class="menu-title">
                                                <a href="#">Variations</a>
                                             </div>
                                             <ul>
                                                <li><a href="product.html">Horizontal Thumbnails</a></li>
                                                <li><a href="product-full-width.html">Vertical Thumbnails<span class="tip tip-hot">Hot!</span></a></li>
                                                <li><a href="product.html">Inner Zoom</a></li>
                                                <li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
                                                <li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
                                             </ul>
                                       </div><!-- End .col-lg-4 -->
                                       <div class="col-lg-4">
                                             <div class="menu-title">
                                                <a href="#">Variations</a>
                                             </div>
                                             <ul>
                                                <li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
                                                <li><a href="product-simple.html">Simple Product</a></li>
                                                <li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
                                             </ul>
                                       </div><!-- End .col-lg-4 -->
                                       <div class="col-lg-4">
                                             <div class="menu-title">
                                                <a href="#">Product Layout Types</a>
                                             </div>
                                             <ul>
                                                <li><a href="product.html">Default Layout</a></li>
                                                <li><a href="product-extended-layout.html">Extended Layout</a></li>
                                                <li><a href="product-full-width.html">Full Width Layout</a></li>
                                                <li><a href="product-grid-layout.html">Grid Images Layout</a></li>
                                                <li><a href="product-sticky-both.html">Sticky Both Side Info<span class="tip tip-hot">Hot!</span></a></li>
                                                <li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
                                             </ul>
                                       </div><!-- End .col-lg-4 -->
                                    </div><!-- End .row -->
                                 </div><!-- End .col-lg-8 -->
                                 <div class="col-lg-4">
                                    <div class="banner">
                                       <a href="#">
                                             <img src="{{asset('public/themes/digishop/images/menu-banner.jpg')}}" alt="Menu banner" class="product-promo">
                                       </a>
                                    </div><!-- End .banner -->
                                 </div><!-- End .col-lg-4 -->
                           </div><!-- End .row -->
                        </div><!-- End .megamenu -->
                     </li>
               </ul>
            </nav>
         </div><!-- End .header-bottom -->
   </div><!-- End .header-bottom -->

</header><!-- End .header -->
