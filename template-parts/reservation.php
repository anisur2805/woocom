<section class="woocom-reservation-wrapper section-fluid"> 
	<div class="woocom-reservation-inner"> 
		<?php printf('<h3 class="wc__shop_by_cat_title wc__shop_by_cat_title_2 aos-init aos-animate" data-aos="fade-right" data-aos-duration="1000">%s</h3>', __('Reservation Form', 'woocom')); ?>
		<form>
			<?php wp_nonce_field('reservation', 'rn'); ?>
			<input name="name" type="text" id="name" placeholder="Name" />
			<input name="email" type="email" id="email" placeholder="Email" />
			<input name="phone" type="text" id="phone" placeholder="Phone" />
			<select id="persons" name="persons">
				<option value="">Select Person</option>
				<option value="1">1 Person</option>
				<option value="2">2 Persons</option>
				<option value="3">3 Persons</option>
			</select>
			<input name="date" type="date" id="date" placeholder="Date" />
			<input name="time" type="time" id="time" placeholder="Time" />
			<input type="submit" id="submitNow" value="Reserve Now"/>
		</form>
	</div>
</section>