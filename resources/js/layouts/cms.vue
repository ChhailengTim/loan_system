<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="dark">
            <b-navbar-brand href="#">Online Loan</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
                <b-nav-item href="javascript:;">Home</b-nav-item>
                <b-nav-item href="javascript:;">Service</b-nav-item>
                <b-nav-item href="javascript:;">About Us</b-nav-item>
                <b-nav-item href="javascript:;">Contact Us</b-nav-item>
                <b-nav-item href="javascript:;">
                    <!-- <nuxt-link to="/request_loa">Request Loan</nuxt-link> -->
                </b-nav-item>
            </b-navbar-nav>

            <b-navbar-nav class="ml-auto">
                <b-nav-form>
                <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
                <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
                </b-nav-form>

                <b-nav-item-dropdown text="Lang" right>
                <b-dropdown-item href="#">EN</b-dropdown-item>
                <b-dropdown-item href="#">KH</b-dropdown-item>
                </b-nav-item-dropdown>

                <b-nav-item-dropdown right>
                <template #button-content>
                    <em>User</em>
                </template>
                <b-dropdown-item href="#">Borrower</b-dropdown-item>
                <b-dropdown-item href="#">Bank</b-dropdown-item>
                </b-nav-item-dropdown>
            </b-navbar-nav>
            </b-collapse>
        </b-navbar>

        <div>
            <b-carousel
                id="carousel-1"
                :interval="4000"
                controls
                indicators
                background="#ababab"
                img-width="1024"
                img-height="480"
                style="text-shadow: 1px 1px 2px #333;"
                >
                <!-- Text slides with image -->
                <b-carousel-slide
                    caption="First slide"
                    text="Nulla vitae elit libero, a pharetra augue mollis interdum."
                    img-src="https://picsum.photos/1024/480/?image=52"
                ></b-carousel-slide>

                <!-- Slides with custom text -->
                <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=54">
                    <h1>Hello world!</h1>
                </b-carousel-slide>

                <!-- Slides with image only -->
                <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=58"></b-carousel-slide>

                <!-- Slides with img slot -->
                <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
                <b-carousel-slide>
                    <template #img>
                    <img
                        class="d-block img-fluid w-100"
                        width="1024"
                        height="480"
                        src="https://picsum.photos/1024/480/?image=55"
                        alt="image slot"
                    >
                    </template>
                </b-carousel-slide>

                <!-- Slide with blank fluid image to maintain slide aspect ratio -->
                <b-carousel-slide caption="Blank Image" img-blank img-alt="Blank image">
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eros felis, tincidunt
                    a tincidunt eget, convallis vel est. Ut pellentesque ut lacus vel interdum.
                    </p>
                </b-carousel-slide>
            </b-carousel>
        </div>
    </div>
</template>
