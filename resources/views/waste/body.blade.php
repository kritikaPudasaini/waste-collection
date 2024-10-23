<style>
    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
        position: relative;
        overflow: hidden;
        border: 1px solid #004721;
        background-image: url('/admincss/img/waste/wms.gif');
        background-size: cover;
        background-position: center;
        margin: 0;
        padding: 0;
    }
</style>

<body id="home">
    <div class="image-container">
    </div>
    
    <!-- Content Section -->
    <div class="full-width-section">
        <div class="container text-center">
            <h2 class="mt-3">Welcome To Our Waste Collection Platform</h2>
            <p>We're committed to promoting a cleaner, greener Kathmandu Valley. Our mission is to collect waste from various sources, including hospitals, schools, colleges, and businesses, throughout the Kathmandu Valley. By encouraging responsible waste disposal practices, we aim to create a sustainable future for the Kathmandu Valley. Join us in our endeavor to make a positive impact on the environment, one collection at a time!</p>
            <div class="d-flex justify-content-center flex-wrap">
                <div class="facility-item">
                    <img src="{{ asset('admincss/img/waste/CI.png') }}" alt="" class="facility-logo">
                    <span>Corporate Institutions</span>
                </div>
                <div class="facility-item">
                    <img src="{{ asset('admincss/img/waste/EI.png') }}" alt="" class="facility-logo">
                    <span>Educational Institutions</span>
                </div>
                <div class="facility-item">
                    <img src="{{ asset('admincss/img/waste/AC.png') }}" alt="" class="facility-logo">
                    <span>Apartment and Colonies</span>
                </div>
                <div class="facility-item">
                    <img src="{{ asset('admincss/img/waste/FB.png') }}" alt="" class="facility-logo">
                    <span>Factories and Bulk</span>
                </div>
                <div class="facility-item">
                    <img src="{{ asset('admincss/img/waste/H.png') }}" alt="" class="facility-logo">
                    <span>Hotels and Restaurants</span>
                </div>                                               
                <div class="facility-item">
                    <img src="{{ asset('admincss/img/waste/Home.png') }}" alt="" class="facility-logo">
                    <span>Households</span>
                </div>
            </div>
        </div>
    </div>
