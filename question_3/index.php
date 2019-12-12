<?php
/**
 * Question 3: In elections that use the ballot box system for voting, each voter writes the name of a candidate on a ballot and places it in the ballot box.
 * The candidate with the highest number of votes wins the election.
 * If two or more candidates have the same number of votes, then the tied candidates' names are ordered alphabetically and the last name in the alphabetical order wins.
 * For example, votes are in the names ['Joe', 'Mary', 'Mary', 'Joe']. Each candidate received two votes, but Mary is alphabetically later than Joe, so she wins.
 * Function Description Complete the function electionWinner below. The function must return a string denoting the name of the winning candidate.
 * // Complete the electionWinner function below.
 * function electionWinner($votes)
 */

//$votes = ['Joe', 'Mary', 'Mary', 'Joe'];
//$votes = ['Joe', 'Mary', 'Mary', 'Joe', 'Joe', 'Mary', 'Mary', 'Joe','Zena','Zena','Zena','Zena'];
$votes = ['Joe', 'Mary', 'Mary', 'Joe', 'Joe', 'Mary', 'Mary', 'Joe','Alex','Alex','Alex','Alex'];

function electionWinner($votes)
{
  $votesByPeople = [];

  foreach ($votes as $vote) {
    if (array_key_exists($vote, $votesByPeople)) {
      $votesByPeople[$vote] = $votesByPeople[$vote] + 1;
    } else {
      $votesByPeople[$vote] = 1;
    }
  }

  $mostVotes = max($votesByPeople);

  $possibleWinners = [];
  foreach ($votesByPeople as $person => $votes) {
    if($votes == $mostVotes){
      array_push($possibleWinners,$person);
    }
  }

  rsort($possibleWinners);

  $winner = $possibleWinners[0];

  return $winner;
}

echo electionWinner($votes);
