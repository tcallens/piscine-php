<?php
class UnholyFactory {

	private $_mem = array();

	public function absorb($who) {
		if (get_parent_class($who)) {
			if (array_key_exists($who->getWho(), $this->_mem))
				echo "(Factory already absorbed a fighter of type ".$who->getWho().")\n";
			else {
				echo "(Factory absorbed a fighter of type ".$who->getWho().")" . PHP_EOL;
				$this->_mem[$who->getWho()] = $who;
			}
		}
		else
			echo "(Factory can't absorb this, it's not a fighter)" . PHP_EOL;
	}
	public function fabricate($rf) {
		if (array_key_exists($rf, $this->_mem)) {
			echo "(Factory fabricates a fighter of type ".$rf.")" . PHP_EOL;
			return (clone $this->_mem[$rf]);
		}
		else {
			echo "(Factory hasn't absorbed any fighter of type ".$rf.")" . PHP_EOL;
			return (null);
		}
	}
}
?>
