<?php
use App\Models\Course;
function search($data){
$resualt= Course::where('name', 'LIKE', '%' . $data . '%')->withAvg('courseReviews', 'rating')->limit(15)->get();
return $resualt;
}





