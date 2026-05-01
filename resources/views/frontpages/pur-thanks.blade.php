@extends('mainpages.master-layout')
@section('title', 'Carspector | Purchase Process - Thank You')
@section('meta_description', '')
@section('header')
    @include('partials.index-header')
@endsection

@section('content')

<section class="next-steps" aria-labelledby="nextStepsTitle">
  <div class="ns-wrap">
    <header class="ns-head">
      <h1 id="nextStepsTitle">Thank you for booking the purchase process!</h1>
      <p class="ns-sub">
        We’ll start processing your request right away. Here’s what happens next:
      </p>
      <p class="ns-duration">
        ⏱️ Note: The entire process usually takes around <strong>2–4 business days</strong> –
        depending on how quickly the seller or dealer responds.
      </p>

    </header>

    <ol class="ns-steps" role="list">
      <li class="ns-step">
        <div class="ns-dot" aria-hidden="true"></div>
        <div class="ns-card">
          <span class="ns-stepno">Step 1</span>
          <h2 class="ns-title">Coordination with the inspector</h2>
          <p class="ns-text">
            We’ll follow up with the inspector who assessed the vehicle on site.
            Together we’ll go through all relevant points – condition, defects, special notes,
            and upcoming costs – so we have a solid basis for the next steps.
          </p>
        </div>
      </li>

      <li class="ns-step">
        <div class="ns-dot" aria-hidden="true"></div>
        <div class="ns-card">
          <span class="ns-stepno">Step 2</span>
          <h2 class="ns-title">Contacting the seller / dealer</h2>
          <p class="ns-text">
            Next, we’ll get in touch with the seller or dealer.
            We’ll clarify any open questions, review the inspection report point by point,
            and negotiate a realistic and fair purchase price in your best interest.
          </p>
        </div>
      </li>

      <li class="ns-step">
        <div class="ns-dot" aria-hidden="true"></div>
        <div class="ns-card">
          <span class="ns-stepno">Step 3</span>
          <h2 class="ns-title">Follow-up with you</h2>
          <p class="ns-text">
            We’ll get back to you with a clear summary:
            the current negotiation status, our price proposal including the reasoning,
            and the most important key details of the purchase. After that, you decide
            whether we should proceed at this price or negotiate again.
          </p>
        </div>
      </li>

      <li class="ns-step">
        <div class="ns-dot" aria-hidden="true"></div>
        <div class="ns-card">
          <span class="ns-stepno">Step 4</span>
          <h2 class="ns-title">Preparing the purchase agreement</h2>
          <p class="ns-text">
            As soon as you agree to the price and want to approve the purchase,
            we’ll take care of preparing the purchase agreement.
            We make sure all key points are correctly and clearly set out,
            so you’re legally on the safe side.
          </p>
        </div>
      </li>

      <li class="ns-step ns-step--last">
        <div class="ns-dot" aria-hidden="true"></div>
        <div class="ns-card">
          <span class="ns-stepno">Step 5</span>
          <h2 class="ns-title">Purchase completion & optional coordination</h2>
          <p class="ns-text">
            After your final approval, we’ll finalize the deal: we align the last steps with the seller,
            ensure clean contract and document handling, and coordinate the handover/pick-up appointment.
            If you’d like, we can also organize transport to your home afterward.
          </p>

          <div class="ns-cta">
            <a class="ns-btn" href="https://www.carspector.de/fahrzeuglieferung" role="button">Request transport without obligation</a>
          </div>
        </div>
      </li>
    </ol>
<!-- EN: New Thank-you/Contact section -->
<div class="ns-contact">
  <h2 class="ns-contact-title">Thank you!</h2>
  <p class="ns-contact-text">
    If you have any questions in the meantime, feel free to reach out to us anytime.
  </p>
  <a class="ns-link" href="https://www.carspector.de/kontakt">Contact us</a>
</div>

<style>
  .ns-contact{
    margin-top: 45px;
    padding: 16px;
    border: 1px solid #eeeeee;
    border-radius: 16px;
    background: #fafafa;
  }

  .ns-contact-title{
    margin: 0 0 6px;
    font-size: 18px;
    line-height: 1.3;
  }

  .ns-contact-text{
    margin: 0 0 10px;
    color: #444;
    line-height: 1.65;
    font-size: 15px;
    max-width: 85ch;
  }

  .ns-link{
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-weight: 700;
    text-decoration: none;
    color: var(--primary);
  }

  .ns-link:hover{ text-decoration: underline; }

  .ns-link:focus{
    outline: 2px solid rgba(0,0,0,.25);
    outline-offset: 3px;
    border-radius: 10px;
  }
</style>

  </div>
</section>

<style>

.ns-duration{
  margin-top: 12px;
  max-width: 75ch;
  padding: 12px 14px;
  border-left: 4px solid var(--primary);
  background: #fafafa;
  color: #333;
  font-size: 14px;
  line-height: 1.6;
}

  .next-steps{
    background: #fff;
    color: #111;
    padding: clamp(24px, 4vw, 56px) 16px;
  }

  .ns-wrap{
    max-width: 980px;
    margin: 0 auto;
  }

  .ns-head{
    margin-bottom: 22px;
  }

  .ns-badge{
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    padding: 8px 12px;
    border: 1px solid #e7e7e7;
    border-radius: 999px;
    background: #fafafa;
    color: #444;
    margin: 0 0 14px;
  }
  .ns-badge::before{
    content:"";
    width: 10px;
    height: 10px;
    border-radius: 999px;
    background: linear-gradient(135deg, #6a5cff, #25b8ff);
    box-shadow: 0 0 0 4px rgba(106,92,255,.12);
  }

  .ns-head h1{
    margin: 0 0 10px;
    font-size: clamp(24px, 3vw, 38px);
    line-height: 1.12;
    letter-spacing: -0.02em;
  }

  .ns-sub{
    margin: 0;
    max-width: 75ch;
    color: #444;
    font-size: 16px;
    line-height: 1.6;
  }

  .ns-steps{
    list-style: none;
    padding: 0;
    margin: 22px 0 0;
    position: relative;
    display: grid;
    gap: 14px;
  }

  /* Timeline line */
  .ns-steps::before{
    content:"";
    position: absolute;
    left: 13px;
    top: 10px;
    bottom: 10px;
    width: 2px;
    background: linear-gradient(180deg, rgba(106,92,255,.55), rgba(37,184,255,.35));
  }

  .ns-step{
    display: grid;
    grid-template-columns: 28px 1fr;
    align-items: start;
    gap: 14px;
    position: relative;
  }

  .ns-dot{
    width: 28px;
    height: 28px;
    border-radius: 999px;
    background: linear-gradient(135deg, #6a5cff, #25b8ff);
    box-shadow: 0 0 0 6px rgba(106,92,255,.10);
    margin-top: 10px;
    position: relative;
    z-index: 1;
  }

  .ns-card{
    background: #fff;
    border: 1px solid #eeeeee;
    border-radius: 16px;
    padding: 16px;
    box-shadow: 0 12px 30px rgba(0,0,0,.06);
  }

  .ns-stepno{
    display: inline-block;
    font-size: 12px;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: #666;
    margin-bottom: 8px;
  }

  .ns-title{
    margin: 0 0 6px;
    font-size: 18px;
    line-height: 1.3;
  }

  .ns-text{
    margin: 0;
    color: #444;
    line-height: 1.65;
    font-size: 15px;
    max-width: 85ch;
  }

  .ns-cta{
    margin-top: 14px;
    padding-top: 14px;
    border-top: 1px dashed #e6e6e6;
    display: grid;
    gap: 10px;
  }

  .ns-btn{
    display: inline-flex;
    justify-content: center;
    align-items: center;
    padding: 12px 14px;
    border-radius: 14px;
    text-decoration: none;
    font-weight: 700;
    width: fit-content;

    /* Adjustment as requested */
    background: var(--primary);
    color: #fff;
  }

  .ns-btn:hover{ transform: translateY(-1px); }
  .ns-btn:active{ transform: translateY(0px); }
  .ns-btn:focus{
    outline: 2px solid rgba(0,0,0,.25);
    outline-offset: 3px;
  }

  @media (max-width: 560px){
    .ns-steps::before{ left: 12px; }
    .ns-step{ grid-template-columns: 26px 1fr; gap: 12px; }
    .ns-dot{ width: 26px; height: 26px; }
    .ns-card{ padding: 14px; }
    .ns-btn{ width: 100%; }
  }

  @media (prefers-reduced-motion: reduce){
    .ns-btn{ transition: none; }
    .ns-btn:hover, .ns-btn:active{ transform: none; }
  }
</style>

@endsection
