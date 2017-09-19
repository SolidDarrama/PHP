<!DOCTYPE html>
<html>
<head>
    <title>Rock, Paper, Scissors, Lizard, Spock!</title>
	<meta charset="utf-8" />
</head>
<h2>Rock, Paper, Scissors, Lizard, Spock!</h2>
<body>
<?php
/*updated 7/29/2017 Jose Guadarrama*/
	function PlayRockPaperScissors($player1Played, $player2Played)
	{		
		$rockBeats = array (0 => 'Scissor', 1 => "Lizard");
		$paperBeats = array (0 => 'Rock', 1 => "Spock");
		$scissorBeats = array (0 => 'Paper', 1 => "Lizard");
		$lizardBeats = array (0 => 'Spock', 1 => "Paper");
		$spockBeats = array (0 => 'Scissor', 1 => "Rock");

		$rockPaperScissorLizardSpock = array (
			'Rock' => $rockBeats,
			'Paper' => $paperBeats,
			'Scissor' => $scissorBeats,
            'Lizard' => $lizardBeats,
		    'Spock' => $spockBeats);
		$result = "";

		if($player1Played === $player2Played)
		{
			$result = "Draw!";
		}
		else if(in_array($player1Played, $rockPaperScissorLizardSpock[$player2Played]))
		{
			$result = $player2Played . " beats " . $player1Played . ". Player 2 wins!";
		}
		else if(in_array($player2Played, $rockPaperScissorLizardSpock[$player1Played]))
		{
			$result = $player1Played . " beats " . $player2Played . ". Player 1 wins!";
		}

		return $result;
	}

	function GenerateRandomSelection()
	{
		$playerSelect = '';
		$playerSelection = rand(1,5);

		switch($playerSelection)
		{
			case 1:
				$playerSelect = 'Rock';
				break;
			case 2:
				$playerSelect = 'Paper';
				break;
			case 3:
				$playerSelect = 'Scissor';
				break;
          	case 4:
				$playerSelect = 'Lizard';
				break;
			case 5:
				$playerSelect = 'Spock';
				break;
			default:
				$playerSelect = '';
				break;
		}

		return $playerSelect;
	}
		
	$player1Plays = GenerateRandomSelection();
	$player2Plays = GenerateRandomSelection();
		
	$result = PlayRockPaperScissors($player1Plays, $player2Plays);
	
?>
</body>
<form action="" method="post">
	<div id="Player1Div" style="float:left; padding-right: 50px; width: 196px;">
		<b>Player 1:</b><br />
		<textarea name="player1TextArea" rows="2" cols="10"><?php echo htmlspecialchars($player1Plays); ?></textarea></div>
	<div id="Player2Div" style="float:left; width: 110px; margin-right: 93px;">
		<b>Player 2:</b><br />
		<textarea name="player2TextArea" rows="2" cols="10"><?php echo htmlspecialchars($player2Plays); ?></textarea><br />
	</div>

	<div style="clear:both" />
	<br/>
	&nbsp;<input type="submit" name="submit" value="Play" style="width: 54px" /><br/>
	<br/>
	<textarea name="quote" rows="2" cols="40"><?php echo htmlspecialchars($result); ?></textarea><br />
</form>
</html>
