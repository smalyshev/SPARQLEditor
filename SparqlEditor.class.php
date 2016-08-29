<?php

/**
 * SPARQL Editor hooks
 */
class SparqlEditor {

	public static function onContentHandlerDefaultModelFor( Title $title, &$model ) {
		global $wgSPARQLEditorNamespaces;
		$ns = $title->getNamespace();

		// Only catch it in allowed namespaces
		if ( !empty( $wgSPARQLEditorNamespaces ) && !in_array( $ns, $wgSPARQLEditorNamespaces ) ) {
			return true;
		}

		if ( substr( $title->getText(), - 7 ) == '.sparql' ) {
			$model = 'sparql';
		}
		return true;
	}

	public static function onContentHandlerForModelID( $modeName, &$handler ) {
		if ( $modeName === SparqlContentHandler::SPARQL_CONTENT_MODEL ) {
			$handler = new SparqlContentHandler();
		}
		return true;
	}

	public static function onCodeEditorGetPageLanguage( $title, &$lang, $model, $format ) {
		if ( $model === SparqlContentHandler::SPARQL_CONTENT_MODEL ) {
			$lang = 'sparql';
		}
		return true;
	}
}