<?php

namespace App\Jobs;

use App\Models\IssueBook;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use App\Models\OverTimeKeppingBookDue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ReturnTimeOverBookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $issuedBooks = IssueBook::all();
        $currentTimestamp = Carbon::now();
        foreach ($issuedBooks as $issuedBook) {
            $issueDate = Carbon::parse($issuedBook->assigned_datetime);
            $addedDaysTimestamp = $issueDate->addDays(5);
            if ($currentTimestamp > $addedDaysTimestamp) {
                $deferenceInDays = $currentTimestamp->diffInDays($addedDaysTimestamp);
                if ($deferenceInDays > 0) {
                    OverTimeKeppingBookDue::create([
                        "user_id" => $issuedBook->assigned_user_id,
                        "issue_book_id" => $issuedBook->id,
                        "day_delay" => $deferenceInDays,
                        "amount" => 5 * $deferenceInDays
                    ]);
                }
            }
        }
    }
}