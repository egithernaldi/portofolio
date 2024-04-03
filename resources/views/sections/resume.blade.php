<!-- ======= Resume Section ======= -->
<section id="resume" class="resume">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Resume</h2>
      {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
    </div>

    <div class="row">
      @foreach ($titleexperiences as $titleexperience)
      <div class="col-lg-12">
        <h3 class="resume-title">{{ $titleexperience->title }}</h3>
        @foreach ($experiences as $experience)
          @if ($experience->id_experience === $titleexperience->id)
            <div class="resume-item">
              <h4>{{ $experience->position }}</h4>
              <h5>{{ $experience->from }} - {{ $experience->to }}</h5>
              <div>
                <strong><em>{{$experience->place}}</em></strong>
              </div>
              <small>{{ $experience->about}}</small>
              <ul class="mt-3">
                {!! nl2br(e($experience->description)) !!}
              </ul>
            </div>
          @endif
        @endforeach
      </div>
      @endforeach
    </div>
  </div>
</section><!-- End Resume Section -->
