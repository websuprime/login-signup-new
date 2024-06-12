<?php

/**
Template Name: Home
 */
get_header();
$Id = get_the_id();

var_dump($ID);
?>
<main>
    <h1 class="d-none"><?php wp_title(); ?></h1>
    <?php
    if (have_rows('giao_dien')) {
        while (have_rows('giao_dien')) : the_row();
            $module_name = get_row_layout();
            switch ($module_name):
                case $module_name:
                get_template_part('component/' . $module_name);
            endswitch;
        endwhile;
    }
    ?>
	<div class="col_wrap">
		<div class="container">
			<h4>
				What Makes Us One Of The Best Spas In Saigon?
			</h4>
		 	<div class="row">
				<div class="col-md-3">
					<div class="main_ctnt">
							<h5>
                            <?php echo get_field('best_spas_in_saigon_heading_1',$ID); ?>
								
						</h5>
						<p>
                        <?php echo get_field('best_spas_in_saigon_description_1',$ID); ?>
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="main_ctnt">
							<h5>
                                 <?php echo get_field('best_spas_in_saigon_heading_2',$ID); ?>								
						</h5>
						<p>
                         <?php echo get_field('best_spas_in_saigon_description_2',$ID); ?>
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="main_ctnt">
							<h5>
                            <?php echo get_field('best_spas_in_saigon_heading_3',$ID); ?>
						</h5>
						<p>
                         <?php echo get_field('best_spas_in_saigon_description_3',$ID); ?>
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="main_ctnt">
							<h5>
                            <?php echo get_field('best_spas_in_saigon_heading_4',$ID); ?>
						</h5>
						<p>
                        <?php echo get_field('best_spas_in_saigon_description_4',$ID); ?>
							
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Faq Section -->
	
	<div class="faq_section">
		<div class="container">
			<h4>
				Frequently Asked Questions
			</h4>
			<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          What services do you offer?
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
<p>
	L’Apothiquaire offers a range of skincare & treatments, yoga and fitness classes at our luxury spa in Ho Chi Minh City. This includes -</p>
		  <p>
			  <strong>L’APOTHIQUAIRE TREATMENTS</strong>
		  </p>
		  <ul>
			  <li>Haute Couture Packages</li>
			  <li>Facial Treatments</li>
			  <li>Body Treatments</li>
			  <li>Jacuzzi Soaks</li>
			  <li>Finishing Touches</li>
		  </ul><br>
		  <p>
			  <strong>VALMONT TREATMENTS</strong>
		  </p>
		  <ul>
			  <li>Signature Rituals</li>
			  <li>Luxurious Treatments</li>
			  <li>Body Signature Programs</li>
			  <li>Complementary Rituals</li>
		</ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Where is L’Apothiquaire French Day Spa located?
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        The spa is conveniently located in District 1 of Ho Chi Minh City, offering an easily accessible retreat from the hustle and bustle of urban life.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Do I need to book in advance for a treatment at L’Apothiquaire?
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Yes, we recommend booking in advance to ensure availability, especially for weekend appointments or specific treatments like those offered by The Spa by Valmont.
      </div>
    </div>
  </div>
				<div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Can I buy a gift certificate?
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Absolutely! Gift certificates are available and can be used towards any of our spa treatments or products. They make a thoughtful gift for any occasion.
    </div>
  </div>
				<div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          What are the spa's operating hours?
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        L’Apothiquaire is open from 10:00 AM to 7:00 PM, Monday to Saturday. It's best to confirm specific times as hours may vary on holidays.
      </div>
    </div>
  </div>
				<div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Are there any amenities I can use during my visit?
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Yes, our facilities include -
		  <ul>
			  <li>Swimming pool</li>
<li>Steam room</li>
<li>Sauna</li>
		  </ul>
<p>These are available for clients to use in conjunction with their treatments.</p>

      </div>
    </div>
  </div>
				<div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          What should I bring to my spa appointment?
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        We provide all necessary amenities, including towels and robes. You should bring any personal items you might need and a swimsuit if you plan to use the pool or sauna.
      </div>
    </div>
  </div>
				<div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          How can I get updates on special offers?
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Subscribe to our newsletter or follow us on social media to receive updates on special offers, new services, and exclusive events at the spa.
      </div>
    </div>
  </div>
				<div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Do you offer yoga and fitness classes?
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Yes, we offer a variety of yoga and fitness classes suitable for all levels. These classes are designed to improve both physical and mental well-being.
      </div>
    </div>
  </div>
								<div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          What is the cancellation policy for appointments?

        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        We kindly request that you cancel or reschedule your appointment at least 24 hours in advance to avoid any cancellation fees.
      </div>
    </div>
  </div>
</div>
		</div>
	</div>
</main>
<?php
get_footer();
