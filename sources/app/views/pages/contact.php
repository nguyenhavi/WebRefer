<!-- Start Content Page -->
<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
        <h1 class="h1">Liên hệ</h1>
        <p>
            Vui lòng để lại thông tin và chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.
        </p>
    </div>
</div>



<!-- Start Contact -->
<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" role="form">
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="inputname">Tên</label>
                    <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Tên">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="inputemail">Email</label>
                    <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                </div>
            </div>
            <form action="/products/order" method="post">
                <div class="mb-3">
                    <label for="inputsubject">Tiêu đề</label>
                    <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="Tiêu đề">
                </div>

                <div class="mb-3">
                    <label for="inputmessage">Nội dung</label>
                    <textarea class="form-control mt-1" id="message" name="message" placeholder="Nội dung"
                        rows="8"></textarea>
                </div>
            </form>
            <div class="row">
                <div class="col text-end mt-2">
                    <button type="submit" class="btn btn-success btn-lg px-3">Gửi</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Contact -->