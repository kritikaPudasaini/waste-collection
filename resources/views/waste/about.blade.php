@include('waste.header')
@include('waste.navbar')
    <div class="about-us">
        <div class="container">
            <div class="row my-5 align-items-center">
                <div class="col-md-6">
                <img src="{{ asset('admincss/img/waste/img1.jpg') }}" class="img-fluid" controls>
                </div>
                <div class="col-md-6">
                    <h2>Our Mission</h2>
                    <p>
                        At Waste Collection, our mission is to provide reliable and sustainable waste management solutions to our community. We are committed to reducing the environmental impact of waste through innovative practices and dedicated service.
                    </p>
                </div> 
            </div>
            <div class="row my-5 align-items-center">
                <div class="col-md-6 order-md-2">
                    <img src="{{ asset('admincss/img/waste/valuesimg.jpg') }}" alt="Values Image" class="img-fluid">
                </div>
                <div class="col-md-6 order-md-1">
                    <h2>Our Values</h2>
                    <p>
                        We value sustainability, community, and innovation. We strive to implement eco-friendly practices, support local communities, and continually seek new ways to improve our services.
                    </p>
                </div>
            </div>
            <div class="row my-5 align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('admincss/img/waste/objectivesimg.jpg') }}" alt="Services Image" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2>Our Services</h2>
                    <p>
                        We offer a range of waste management services including residential and commercial waste collection, recycling programs, and special waste disposal. Our team works hard to ensure that your waste is managed efficiently and responsibly.
                    </p>
                </div>
            </div>
            <div class="row my-5 align-items-center">
                <div class="col-md-6 order-md-2">
                    <img src="{{ asset('admincss/img/waste/servicesimg.jpg') }}" alt="Objectives Image" class="img-fluid">
                </div>
                <div class="col-md-6 order-md-1">
                    <h2> Our Objectives</h2>
                    <p>
                        Our objectives are to minimize landfill waste, maximize recycling efforts, and promote environmental awareness within the community. We aim to provide top-notch waste management services while prioritizing sustainability and customer satisfaction.
                    </p>
                </div>
            </div>
        </div>
    </div>
    @include('waste.footer')