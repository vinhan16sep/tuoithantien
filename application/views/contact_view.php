<section class="content container-fluid">
    <!-- InstanceBeginEditable name="content" -->
    <div class="container">
        <div class="row">
            <div class="contact-navside col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="content-title">
                    <h2>Liên hệ với chúng tôi</h2>
                </div>
                <address>
                    <strong>CTY TNHH MTV TM hóa mỹ phẩm Nam Anh Khương</strong>
                    <br>
                    Địa chỉ: 11/B6 KP. Bình Thuận 2, P.Thuận Giao, TX.Thuận An, Bình Dương
                    <br>
                    Điện thoại: 0650 3717507 hoặc 0983 979 567
                    <br>
                    Email: namanhkhuong@yahoo.com.vn
                    <br>
                    Website: www.hoamyphamnamanhkhuong.com
                </address>

                <div class="content-title">
                    <h2>Liên hệ với chúng tôi</h2>
                </div>
                <div class="contact-form">
                    <label for="inputName">Họ tên (*)</label>
                    <input type="type" class="form-control" id="inputName" placeholder="Họ tên">
                    <br>
                    <label for="inputEmail">Email (*)</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    <br>
                    <label for="inputPhone">Số điện thoại (*)</label>
                    <input type="type" class="form-control" id="inputPhone" placeholder="Số điện thoại">
                    <br>
                    <label for="inputPhone">Lý do bạn đang cần liên hệ</label>
                    <select class="form-control" id="inputReason">
                        <option>Bạn đang cần liên hệ với chúng tôi vì...</option>
                        <option>Tôi đang cần tư vấn làm đẹp</option>
                        <option>Tôi đang cần tư vấn về sản phẩm</option>
                        <option>Tôi muốn tìm hiểu về ABC</option>
                        <option>Tôi muốn tìm hiểu về DEF</option>
                    </select>
                    <br>
                    <textarea class="form-control" rows="4" placeholder="Tin nhắn..."></textarea>
                    <br>
                    <button type="submit" class="btn btn-default btn-fill">Gửi đi</button>
                </div>
            </div>

            <div class="about-content col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="map" id="map"></div>
            </div>
        </div>
    </div>

    <!-- InstanceEndEditable -->
</section>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVldQrvD6TdflBLsoI9eNdXBUwHFwvp-c&callback=initMap">
</script>
<script>
    function initMap() {
        var uluru = {lat: 21.0166644, lng: 105.8484143};
        var iconBase = {
        }

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: uluru,
            scrollwheel: false,
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            icon: "assets/public/img/marker.png"
        });
    }
</script>