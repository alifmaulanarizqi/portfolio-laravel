<section class="homeContact">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form action="{{ route('send.message') }}" method="POST">
                            @csrf
                            <input type="text" name="name" placeholder="Enter name*">
                            <input type="email" name="email" placeholder="Enter email*">
                            <input type="text" name="subject" placeholder="Enter subject*">
                            <textarea name="message" placeholder="Enter Massage*"></textarea>
                            <button type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
