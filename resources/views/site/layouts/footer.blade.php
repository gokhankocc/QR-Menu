<footer>
    <div class="footer-grid">
        <div class="footer-left">
            <h4>Cajun Corner</h4>
            <p><i class="fas fa-map-marker-alt"></i> {{$settings->full_address}}</p>
            <p><i class="fas fa-phone"></i> <a href="tel:{{$settings->phone}}">
                    +90 {{substr($settings->phone,0,3)}} {{substr($settings->phone,3,3) . " " . substr($settings->phone,6,2) . " " . substr($settings->phone,8,4) }}</a></p>
            <p><i class="fas fa-envelope"></i> <a href="mailto:{{$settings->email}}">{{$settings->email}}</a></p>
        </div>
        <div class="footer-right">
            <h4>Bizi Takip Et</h4>
            <div class="social-icons">
                <a href="{{$settings->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>
