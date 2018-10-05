<section id="today-on-aspire" class="py-5 bg-light">
  <div class="container">

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-on-now-tab" data-toggle="pill" href="#pills-on-now" role="tab" aria-controls="pills-on-now" aria-expanded="true">On Now</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-prime-time-tab" data-toggle="pill" href="#pills-prime-time" role="tab" aria-controls="pills-prime-time" aria-expanded="true">Prime Time</a>
      </li>

      <?php
      if(!is_page('schedule')) : ?>
        <li class="nav-item ml-sm-auto">
          <a class="nav-link" id="pills-full-schedule-tab" href="/schedule/" role="tab">Full Schedule ></a>
        </li>
      <?php
      endif; ?>
    </ul>

    <div class="tab-content" id="pills-tabContent">

      <div class="tab-pane fade show active" id="pills-on-now" role="tabpanel" aria-labelledby="pills-on-now-tab">
        <div class="card-deck">
          <?php get_template_part('templates-partials/block', 'timeslot-on-now'); ?>
          <?php get_template_part('templates-partials/block', 'timeslot-up-next'); ?>
          <?php get_template_part('templates-partials/block', 'timeslot-up-next-offset-2'); ?>
        </div>
      </div>

      <div class="tab-pane fade" id="pills-prime-time" role="tabpanel" aria-labelledby="pills-prime-time-tab">
        <div class="card-deck">
          <?php get_template_part('templates-partials/block', 'timeslot-tonight-7pm'); ?>
          <?php get_template_part('templates-partials/block', 'timeslot-tonight-8pm'); ?>
          <?php get_template_part('templates-partials/block', 'timeslot-tonight-9pm'); ?>
        </div>
      </div>
    </div>

  </div>
</section>
