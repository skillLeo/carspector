<?php

if (!function_exists('check_city')){
  function check_city($cityid){
      $check=\App\Models\ExaminerCity::where('user_id',auth()->id())
          ->where('city_id',$cityid)->first();
      if ($check){
          return true;
      }
      return false;
  }
}
if (!function_exists('completed_order')){
    function completed_order($id){
     $orders=\App\Models\Order::where('examiner_id',$id)->count();
     return $orders;
    }
}
if (!function_exists('check_time')){
    function check_time($time,$date){
        $now=\Carbon\Carbon::parse($date);
        $availability=\App\Models\ExaminerAvailability::where('examiner_id',auth()->user()->id)
            ->where('date',$now->toDateString())
            ->get()->last();
        if ($availability){
            $checkTime=\App\Models\AvailibiltyTime::where('availability_id',$availability->id)
                ->where('time',date('H:i:s',strtotime($time)))->get()->last();
        if ($checkTime){
            return true;
        }
        }
        return false;
    }
}
if (!function_exists('total_reviews')){
    function total_reviews($id){
        $count=\App\Models\Review::where('examiner_id',$id)->count();
        return $count;
    }
}
if(!function_exists('examiner_review')){
    function examiner_review($id){
        $reviews=\App\Models\Review::where('examiner_id',$id)->get();
        return $reviews;
    }
}
if(!function_exists('three_reviews')){
    function three_reviews($id){
        $reviews=\App\Models\Review::where('examiner_id',$id)->orderBy('id','DESC')->limit(3)->get();
        return $reviews;
    }
}
if (!function_exists('avg_reviews')){
    function avg_reviews($id){
        $avg=\App\Models\Review::where('examiner_id',$id)->avg('rating_with_examiner');
        return number_format($avg,1);
    }
}
if (!function_exists('check_2hour_availability')){
   function check_2hour_availability($id)
    {
        $user=\App\Models\User::find($id);
        if ($user){
            $order=\App\Models\Order::where('examiner_id',$user->id)->get()->last();
            if ($order){
                if (request('date')!='' && request('time')!='Zeit auswählen (optional)') {
                    $date = \Carbon\Carbon::parse(request('date'));
                    $now = \Illuminate\Support\Carbon::parse(request('date') .(request('time')!='Zeit auswählen (optional)'? ' ' . request('time'):''));
                    $avb = \App\Models\ExaminerAvailability::where('examiner_id', $user->id)
                        ->where('date', $date->toDateString())->get()->last();
                    if ($avb) {
                        $oderDateTime = \Carbon\Carbon::parse($order->date . ' ' . $order->time);
                        $minutes = $now->diffInMinutes($oderDateTime);
                        if ($minutes >= 0 && $minutes < 120) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }
}
if (!function_exists('stripe_secrete')){
    function stripe_secrete(){

    }
}

if (!function_exists('stripe_price')){

    function stripe_price()
    {
        # return "price_1PIpSuBc4wOXvSFqv77kph6v";
        # 299 return "price_1PSG0ABc4wOXvSFqjS2QFFDQ";
        return "price_1PZJXMBc4wOXvSFqjoJmvfmz";
    }
}
if (!function_exists('examiner')){
    function examiner($id){
        $examiner=\App\Models\User::find($id);
        if ($examiner){
            return $examiner->name.' ('.$id.')';
        }
        return 'No Examiner';
    }
}
if (!function_exists('booking_amount_calculator')){
    function booking_amount_calculator($booking){
        $amount=0;
//            dd($booking);

        $title='';
        $description='';

        if ($booking['vehicle_type']=='transporter')
        {

            if($booking['option']==1) {

                $amount = 349;
                $title = 'Transporter-Check XL';
                $description = "Wir fahren zu deinem gewünschten Transporter, prüfen ihn vor Ort nach TÜV-Vorgaben, erstellen einen umfassenden Transporter-Zustandsbericht und dokumentieren den Zustand mit Fotos.";

            }else{
                $amount = 399;
                $title = 'Transporter-Check XXL';
                $description = "Wir fahren zu deinem gewünschten Transporter, prüfen ihn vor Ort nach TÜV-Vorgaben, erstellen einen umfassenden Transporter-Zustandsbericht und dokumentieren den Zustand mit Fotos. Zusätzlich erhältst du eine Marktwertanalyse, eine Kostenübersicht, eine FIN-Abfrage und weitere relevante Dokumente.";

            }
        }
        else if ($booking['vehicle_type']=='oldtimer')
        {

            if($booking['option']==1) {
                $amount=349;


            $title='Oldtimer-Check XL';
            $description = "Wir fahren zu deinem gewünschten Oldtimer, prüfen ihn vor Ort nach TÜV-Vorgaben, erstellen einen umfassenden Oldtimer-Zustandsbericht und dokumentieren den Zustand mit Fotos.";

                }else{
                $amount=399;


                $title='Oldtimer-Check XXL';
                $description = "Wir fahren zu deinem gewünschten Oldtimer, prüfen ihn vor Ort nach TÜV-Vorgaben, erstellen einen umfassenden Oldtimer-Zustandsbericht und dokumentieren den Zustand mit Fotos. Zusätzlich erhältst du eine Marktwertanalyse, eine Kostenübersicht, eine FIN-Abfrage und weitere relevante Dokumente.";


            }
            }
        else if ($booking['vehicle_type']=='sportwagen')
        {

            if ($booking['option']==1) {
                $amount=349;
                $title='Sportwagen-Check XL';
                $description = "Wir fahren zu deinem gewünschten Sportwagen, prüfen ihn vor Ort nach TÜV-Vorgaben, erstellen einen umfassenden Sportwagen-Zustandsbericht und dokumentieren den Zustand mit Fotos.";

            }else{
                $amount=399;
                $title='Sportwagen-Check XXL';
                $description = "Wir fahren zu deinem gewünschten Sportwagen, prüfen ihn vor Ort nach TÜV-Vorgaben, erstellen einen umfassenden Sportwagen-Zustandsbericht und dokumentieren den Zustand mit Fotos. Zusätzlich erhältst du eine Marktwertanalyse, eine Kostenübersicht, eine FIN-Abfrage und weitere relevante Dokumente.";

            }

        }
        else if ($booking['vehicle_type']=='elektro')
        {

            if ($booking['option']==1) {
                $amount=349;
                $title='Elektro-Check XL';
                $description = "Wir fahren zu deinem gewünschten Elektrofahrzeug, prüfen es vor Ort nach TÜV-Vorgaben inkl. Sichtprüfung des Hochvoltsystems, erstellen einen umfassenden Elektrofahrzeug-Zustandsbericht und dokumentieren den Zustand mit Fotos.";

            }else{
                $amount=399;
                $title='Elektro-Check XXL';
                $description = "Wir fahren zu deinem gewünschten Elektrofahrzeug, prüfen es vor Ort nach TÜV-Vorgaben inkl. Sichtprüfung des Hochvoltsystems, erstellen einen umfassenden Elektrofahrzeug-Zustandsbericht und dokumentieren den Zustand mit Fotos. Zusätzlich erhältst du eine Marktwertanalyse, eine Kostenübersicht, eine FIN-Abfrage und weitere relevante Dokumente.";

            }

        }else if($booking['vehicle_type']=='wohnmobil'){
            if ($booking['option']==1) {
                $amount=399;
                $title='Wohnmobil-Check XL';
                $description = "Wir fahren zu deinem gewünschten Wohnmobil, prüfen es vor Ort nach TÜV-Vorgaben, erstellen einen umfassenden Wohnmobil-Zustandsbericht und dokumentieren den Zustand mit Fotos.";

            }else{
                $amount=449;
                $title='Wohnmobil-Check XXL';
                $description = "Wir fahren zu deinem gewünschten Wohnmobil, prüfen es vor Ort nach TÜV-Vorgaben, erstellen einen umfassenden Wohnmobil-Zustandsbericht und dokumentieren den Zustand mit Fotos. Zusätzlich erhältst du eine Marktwertanalyse, eine Kostenübersicht, eine FIN-Abfrage und weitere relevante Dokumente.";

            }
        }else if($booking['vehicle_type']=='sonstiges'){
            if ($booking['option']==1) {
                $amount=299;
                $title='Sonstiges-Check';
                $description = "Wir prüfen deinen gewünschten Transporter vor Ort nach TÜV-Vorgaben, erstellen einen umfassenden Gebrauchtwagen-Zustandsbericht und dokumentieren den Zustand mit Fotos.";

            }else{
                $amount=319;
                $title='Sonstiges-Check';
                $description="Wir fahren zu deinem gewünschten Sportwagen und prüfen ihn nach TÜV-Vorgaben, erstellen einen umfassenden Gebrauchtwagen-Zustandsbericht, dokumentieren den Zustand mit Fotos und berücksichtigen deine individuellen Wünsche und Vorstellungen.";

            }
        }else if($booking['vehicle_type']=='kaufbegleitung'){
            if ($booking['option']==1) {
                $amount=329;
                $title='Kaufbegleitung XL';
                $description = "Ein qualifizierter Kfz-Experte begleitet dich bei der Besichtigung und prüft dein gewünschtes Auto direkt vor Ort nach unserem detaillierten Leitfaden.";

            }else{
                $amount=379;
                $title='Kaufbegleitung XXL';
                $description="Ein qualifizierter Kfz-Experte begleitet dich bei der Besichtigung und prüft dein gewünschtes Auto direkt vor Ort nach unserem detaillierten Leitfaden. Zusätzlich erhältst du eine Marktwertanalyse, eine Kostenübersicht, eine FIN-Abfrage und weitere relevante Dokumente.";

            }
        }
        else
        {

            $amount=249;




            if ($booking['option']==1) {
                $amount=299;
                $title='Auto/ PKW Check XL';
                $description = "Wir fahren zu deinem gewünschten Fahrzeug, prüfen es vor Ort nach TÜV-Vorgaben, erstellen einen umfassenden Gebrauchtwagen-Zustandsbericht und dokumentieren den Zustand mit Fotos.";
            }else{
                $amount=349;
                $title='Auto/ PKW Check XXL';
                $description = "Wir fahren zu deinem gewünschten Fahrzeug, prüfen es vor Ort nach TÜV-Vorgaben, erstellen einen umfassenden Gebrauchtwagen-Zustandsbericht und dokumentieren den Zustand mit Fotos. Zusätzlich erhältst du eine Marktwertanalyse, eine Kostenübersicht, eine FIN-Abfrage und weitere relevante Dokumente.";
            }



        }

        if (isset($booking['negotiation_list']) && $booking['negotiation_list'] == '1') {
            $amount += 19;
            $title .= ' + Verhandlungs-Checkliste';
        }

        // Add language to title if applicable
        if (isset($booking['language']) && $booking['language'] == 'english') {
            $amount += 9;
            $title .= ' & Dokumente auf Englisch';
        }


        return ['amount'=>$amount,'title'=>$title,'description'=>$description];
    }
}

// price_1P7EvXBc4wOXvSFqHoFw0BKO
