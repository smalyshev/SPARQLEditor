<?php
/**
 * Content handler for SPARQL.
 *
 * @since 1.28
 * @ingroup Content
 */
class SparqlContentHandler extends CodeContentHandler {

	/**
	 * Content model name for SPARQL content.
	 */
	const SPARQL_CONTENT_MODEL = 'sparql';

	public function __construct( $modelId = self::SPARQL_CONTENT_MODEL ) {
		parent::__construct( $modelId, [ self::SPARQL_CONTENT_MODEL ] );
	}

	/**
	 * @return string
	 */
	protected function getContentClass() {
		return SparqlContent::class;
	}
}
