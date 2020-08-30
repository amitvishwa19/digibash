<div class="side-menu-container">
    <h2>CATEGORIES</h2>

    <nav class="side-nav">

        <ul class="menu menu-vertical sf-arrows">

            <li>
                <a href="category.html" class="sf-with-ul"><i class="icon-briefcase"></i>
                Categories</a>
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

            <li class="megamenu-container">
                <a href="product.html" class="sf-with-ul"><i class="icon-video"></i>Products</a>
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

            @foreach(category('e-commerce') as $category)
                @foreach($category->child as $parent)
                <li>
                    <a href="{{route('category.products',$parent->slug)}}" class=""><i class="{{$parent->icon_class}}"></i>{{$parent->name}}</a>
                        @if(!$parent->child->isEmpty())
                        <ul>
                            @foreach($parent->child as $child)
                                <li><a href="{{route('category.products',$child->slug)}}">{{$child->name}}</a>
                                    @if(!$child->child->isEmpty())
                                    <ul>
                                        @foreach($child->child as $subchild)
                                            <li>
                                                <a href="{{route('category.products',$subchild->slug)}}">{{$subchild->name}}</a>
                                                @if(!$subchild->child->isEmpty())
                                                <ul>
                                                    @foreach($subchild->child as $subsubchild)
                                                        <li>
                                                            <a href="{{route('category.products',$subsubchild->slug)}}">{{$subsubchild->name}}</a>

                                                        </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        @endif
                </li>
                @endforeach
            @endforeach

        </ul>
    </nav>
</div><!-- End .side-menu-container -->
