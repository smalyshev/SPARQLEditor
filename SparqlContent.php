<?php
/**
 * Content object for SPARQL pages.
 *
 * @since 1.28
 * @file
 * @ingroup Content
 *
 */

/**
 * Content object for SPARQL pages.
 *
 * @ingroup Content
 */
class SparqlContent extends TextContent {

	/**
	 * @param string $text SPARQL code.
	 * @param string $modelId the content content model
	 */
	public function __construct( $text, $modelId = SparqlContentHandler::SPARQL_CONTENT_MODEL ) {
		parent::__construct( $text, $modelId );
	}

	/**
	 * Returns a Content object with pre-save transformations applied using
	 * Parser::preSaveTransform().
	 *
	 * @param Title $title
	 * @param User $user
	 * @param ParserOptions $popts
	 *
	 * @return SparqlContent
	 *
	 * @see TextContent::preSaveTransform
	 */
	public function preSaveTransform( Title $title, User $user, ParserOptions $popts ) {
		global $wgParser;
		// @todo Make pre-save transformation optional for script pages

		$text = $this->getNativeData();
		$pst = $wgParser->preSaveTransform( $text, $title, $user, $popts );

		return new static( $pst );
	}

	/**
	 * @return string SPARQL wrapped in a <pre> tag.
	 */
	protected function getHtml() {
		$html = "";
		$html .= "<pre class=\"mw-code mw-sparql\" dir=\"ltr\">\n";
		$html .= htmlspecialchars( $this->getNativeData() );
		$html .= "\n</pre>\n";

		return $html;
	}
}
