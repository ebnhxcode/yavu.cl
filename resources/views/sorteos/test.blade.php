@foreach ($raffles as $key => $raffle)
	

	<input type="text" name="name" value="{{ $raffle->participant_to_win_id[0]->id }}">

@endforeach