<?php

class LocalHooks {
	/* http://www.pathvisio.org/ticket/1539 */
	static public function externalLink ( &$url, &$text, &$link, &$attribs ) {
		global $wgExternalLinkTarget;
		wfProfileIn( __METHOD__ );
		if( $wgExternalLinkTarget !== false ) {
			$attribs["target"] = $wgExternalLinkTarget;
		} else {
			$attribs["target"] = "_blank";
		}
		wfProfileOut( __METHOD__ );


		return true;
	}
}

$wgHooks['LinkerMakeExternalLink'][] = 'LocalHooks::externalLink';
