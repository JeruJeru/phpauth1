<?php

	/**
	 * Plain
	 *
	 * Escape (though not from New York)
	 *
	 * @param  string $str
	 * @return string
	 */
	function plain( $str )
	{
		return htmlspecialchars( $str, ENT_QUOTES );
	}