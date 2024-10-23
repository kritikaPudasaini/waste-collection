
@include('waste.header')
@include('waste.navbar')

    <!-- Support Section -->
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <div class="row contact-section text-center">
        <div class="col-md-6 contact-form">
            <h2>Contact Us</h2>
            <p>Feel free to contact us any time. We will get back to you as soon as we can!</p>
            <form id="contactForm" action="{{ route('comments.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{ old('phone') }}" required>
            </div>

            <div class="form-group">
                <textarea name="message" class="form-control" id="message" rows="4" placeholder="Message" required>{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="btn btn-custom btn-block">SEND</button>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('admincss/img/waste/google-map.jpg') }}" class="img-fluid custom-image" alt="Google Map">
            </div>
        </div>
        <div class="col-12 contact-info">
            <h3>Contact Info</h3>
            <p><i class="fa fa-envelope highlight"></i> <a href="mailto:wastecollection@gmail.com">wastecollection@gmail.com</a></p>
            <p><i class="fa fa-phone highlight"></i> +977 9849708065</p>
            <p><i class="fa fa-map-marker-alt highlight"></i> P977+V5J, Partitar, Kathmandu 44600</p>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#contactForm').on('submit', function(event) {
            event.preventDefault();

            var formData = {
                name: $('#name').val(),
                email: $('#email').val(),
                message: $('#message').val()
            };

            $.ajax({
                type: 'POST',
                url: 'path/to/your/server-side/script',
                data: formData,
                dataType: 'json',
                encode: true
            }).done(function(data) {
                alert('Your message has been sent successfully!');
                $('#contactForm')[0].reset();
            }).fail(function(data) {
                alert('An error occurred. Please try again.');
            });
        });
    });

</script>

   <!--Google APIs -->
   <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer>
    </script>
    <script>
        function initMap() {
            var mapOptions = {
                center: { lat: -34.397, lng: 150.644 }, // Set your desired initial coordinates
                zoom: 8
            };
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        }
    </script>
     -->

    @include('waste.footer')

