<?php 
class Standard_action_index_4d3cd4c95efc8ca5ca9cf9ac646dbaad69cd8c5c extends \TYPO3Fluid\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getLayoutName(\TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this; 
return (string) '';
}
public function hasLayout() {
return FALSE;
}
public function addCompiledNamespaces(\TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$renderingContext->getViewHelperResolver()->addNamespaces(array (
  'f' => 
  array (
    0 => 'TYPO3Fluid\\Fluid\\ViewHelpers',
    1 => 'Neos\\FluidAdaptor\\ViewHelpers',
  ),
  'neos.errormessages' => 
  array (
    0 => 'Neos\\Error\\Messages\\ViewHelpers',
  ),
  'neos.utility.files' => 
  array (
    0 => 'Neos\\Utility\\ViewHelpers',
  ),
  'neos.utility.pdo' => 
  array (
    0 => 'Neos\\Utility\\ViewHelpers',
  ),
  'neos.utility.opcodecache' => 
  array (
    0 => 'Neos\\Utility\\ViewHelpers',
  ),
  'neos.cache' => 
  array (
    0 => 'Neos\\Cache\\ViewHelpers',
  ),
  'neos.utilityunicode' => 
  array (
    0 => 'Neos\\Utility\\Unicode\\ViewHelpers',
  ),
  'neos.utility.objecthandling' => 
  array (
    0 => 'Neos\\Utility\\ViewHelpers',
  ),
  'neos.utility.arrays' => 
  array (
    0 => 'Neos\\Utility\\ViewHelpers',
  ),
  'neos.utility.mediatypes' => 
  array (
    0 => 'Neos\\Utility\\ViewHelpers',
  ),
  'neos.utility.schema' => 
  array (
    0 => 'Neos\\Utility\\ViewHelpers',
  ),
  'typo3fluid.fluid' => 
  array (
    0 => 'TYPO3Fluid\\Fluid\\ViewHelpers',
  ),
  'psr.httpmessage' => 
  array (
    0 => 'Psr\\Http\\Message\\ViewHelpers',
  ),
  'ramsey.uuid' => 
  array (
    0 => 'Ramsey\\Uuid\\ViewHelpers',
  ),
  'doctrine.common.collections' => 
  array (
    0 => 'Doctrine\\Common\\Collections\\ViewHelpers',
  ),
  'doctrine.inflector' => 
  array (
    0 => 'Doctrine\\Common\\Inflector\\ViewHelpers',
  ),
  'doctrine.cache' => 
  array (
    0 => 'Doctrine\\Common\\Cache\\ViewHelpers',
  ),
  'doctrine.common.lexer' => 
  array (
    0 => 'Doctrine\\Common\\Lexer\\ViewHelpers',
  ),
  'doctrine.annotations' => 
  array (
    0 => 'Doctrine\\Common\\Annotations\\ViewHelpers',
  ),
  'doctrine.common' => 
  array (
    0 => 'Doctrine\\Common\\ViewHelpers',
  ),
  'doctrine.dbal' => 
  array (
    0 => 'Doctrine\\DBAL\\ViewHelpers',
  ),
  'doctrine.instantiator' => 
  array (
    0 => 'Doctrine\\Instantiator\\ViewHelpers',
  ),
  'symfony.polyfillmbstring' => 
  array (
    0 => 'Symfony\\Polyfill\\Mbstring\\ViewHelpers',
  ),
  'psr.log' => 
  array (
    0 => 'Psr\\Log\\ViewHelpers',
  ),
  'symfony.debug' => 
  array (
    0 => 'Symfony\\Component\\Debug\\ViewHelpers',
  ),
  'symfony.console' => 
  array (
    0 => 'Symfony\\Component\\Console\\ViewHelpers',
  ),
  'doctrine.orm' => 
  array (
    0 => 'Doctrine\\ORM\\ViewHelpers',
  ),
  'symfony.yaml' => 
  array (
    0 => 'Symfony\\Component\\Yaml\\ViewHelpers',
  ),
  'zendframework.zendeventmanager' => 
  array (
    0 => 'Zend\\EventManager\\ViewHelpers',
  ),
  'zendframework.zendcode' => 
  array (
    0 => 'Zend\\Code\\ViewHelpers',
  ),
  'ocramius.packageversions' => 
  array (
    0 => 'PackageVersions\\ViewHelpers',
  ),
  'ocramius.proxymanager' => 
  array (
    0 => 'ProxyManager\\ViewHelpers',
  ),
  'doctrine.migrations' => 
  array (
    0 => 'Doctrine\\DBAL\\Migrations\\ViewHelpers',
  ),
  'symfony.domcrawler' => 
  array (
    0 => 'Symfony\\Component\\DomCrawler\\ViewHelpers',
  ),
  'neos.composerplugin' => 
  array (
    0 => 'Neos\\ComposerPlugin\\ViewHelpers',
  ),
  'phpdocumentor.reflectioncommon' => 
  array (
    0 => 'phpDocumentor\\Reflection\\ViewHelpers',
  ),
  'phpdocumentor.typeresolver' => 
  array (
    0 => 'phpDocumentor\\Reflection\\ViewHelpers',
  ),
  'webmozart.assert' => 
  array (
    0 => 'Webmozart\\Assert\\ViewHelpers',
  ),
  'phpdocumentor.reflectiondocblock' => 
  array (
    0 => 'phpDocumentor\\Reflection\\ViewHelpers',
  ),
  'neos.eel' => 
  array (
    0 => 'Neos\\Eel\\ViewHelpers',
  ),
  'neos.utilitylock' => 
  array (
    0 => 'Neos\\Utility\\Lock\\ViewHelpers',
  ),
  'neos.fluidadaptor' => 
  array (
    0 => 'Neos\\FluidAdaptor\\ViewHelpers',
  ),
  'neos.flow' => 
  array (
    0 => 'Neos\\Flow\\ViewHelpers',
    1 => 'Neos\\Flow\\Core\\Migrations\\ViewHelpers',
  ),
  'neos.welcome' => 
  array (
    0 => 'Neos\\Welcome\\ViewHelpers',
  ),
  'neos.behat' => 
  array (
    0 => 'Neos\\Behat\\ViewHelpers',
  ),
  'org.bovigo.vfs' => 
  array (
    0 => 'org\\bovigo\\vfs\\ViewHelpers',
  ),
  'myclabs.deepcopy' => 
  array (
    0 => 'DeepCopy\\ViewHelpers',
  ),
  'phpspec.prophecy' => 
  array (
    0 => 'Prophecy\\ViewHelpers',
  ),
  'neos.kickstarter' => 
  array (
    0 => 'Neos\\Kickstarter\\ViewHelpers',
  ),
));
}

/**
 * Main Render function
 */
public function render(\TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Welcome to Flow</title>
';
// Rendering ViewHelper Neos\FluidAdaptor\ViewHelpers\BaseViewHelper
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments1 = array();

$output0 .= Neos\FluidAdaptor\ViewHelpers\BaseViewHelper::renderStatic($arguments1, $renderChildrenClosure2, $renderingContext);
$output3 = '';

$output3 .= '
<link rel="stylesheet" type="text/css" href="';
// Rendering ViewHelper Neos\FluidAdaptor\ViewHelpers\Uri\ResourceViewHelper
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments4 = array();
$arguments4['path'] = NULL;
$arguments4['package'] = NULL;
$arguments4['resource'] = NULL;
$arguments4['localize'] = true;
$arguments4['path'] = 'Styles/Styles.css';

$output3 .= Neos\FluidAdaptor\ViewHelpers\Uri\ResourceViewHelper::renderStatic($arguments4, $renderChildrenClosure5, $renderingContext);

$output3 .= '" />
<script type="text/javascript" src="';
// Rendering ViewHelper Neos\FluidAdaptor\ViewHelpers\Uri\ResourceViewHelper
$renderChildrenClosure7 = function() use ($renderingContext, $self) {
return NULL;
};
$arguments6 = array();
$arguments6['path'] = NULL;
$arguments6['package'] = NULL;
$arguments6['resource'] = NULL;
$arguments6['localize'] = true;
$arguments6['path'] = 'Libraries/jquery/jquery';

$output3 .= Neos\FluidAdaptor\ViewHelpers\Uri\ResourceViewHelper::renderStatic($arguments6, $renderChildrenClosure7, $renderingContext);

$output3 .= '-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(\'.tab\').each(function(index, element) {
		$(element).addClass(index == 0 ? \'tab-active\' : \'tab-inactive\');
		$(element).find(\'h2\').first().click(function() {
			$(\'.tab\').removeClass(\'tab-active\').addClass(\'tab-inactive\');
			$(element).addClass(\'tab-active\').removeClass(\'tab-inactive\');
		});
	});
});
</script>
</head>
<body>

<div id="application-bar">
<div class="logo">Flow</div> <h1 class="title">Welcome</h1>
<div class="version">';

$output0 .= $output3;
$array8 = array (
);
$output0 .= htmlspecialchars($renderingContext->getVariableProvider()->getByPath('version', $array8), ENT_QUOTES);

$output0 .= '</div>
</div>

<div id="messages">
';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\IfViewHelper
$renderChildrenClosure10 = function() use ($renderingContext, $self) {
return '
	<div class="notice">
		<h2>Switch to Development context</h2>
		<p>You should enable the Development context for your first steps into the world of Flow!<br />
		Check the <a href="http://flowframework.readthedocs.io/en/latest/TheDefinitiveGuide/" target="flow">Flow reference</a> and/or
		the <a href="http://flowframework.readthedocs.io/en/latest/Quickstart/" target="flow">Quickstart tutorial</a> for instructions.</p>
	</div>
';
};
$arguments9 = array();
$arguments9['then'] = NULL;
$arguments9['else'] = NULL;
$arguments9['condition'] = false;
// Rendering Boolean node
// Rendering Array
$array11 = array();
$array12 = array (
);$array11['0'] = $renderingContext->getVariableProvider()->getByPath('notDevelopmentContext', $array12);

$expression13 = function($context) {return ($context["node0"]);};
$arguments9['condition'] = TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(
					$expression13(
						TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\BooleanNode::gatherContext($renderingContext, $array11)
					),
					$renderingContext
				);
$arguments9['__thenClosure'] = $renderChildrenClosure10;

$output0 .= TYPO3Fluid\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments9, $renderChildrenClosure10, $renderingContext);

$output0 .= '
</div>

<div id="window">
	<div class="tabs">
		<div class="tab">
			<h2 class="title title-getting-started">Getting started</h2>
			<div class="content">
				<div class="main">
					<div class="spacer">
						<p>Here\'s how to get into the flow:</p>
						<ol class="steps">
							<li>
								<h3>Kickstart your first package</h3>
								';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\IfViewHelper
$renderChildrenClosure15 = function() use ($renderingContext, $self) {
$output25 = '';

$output25 .= '
									';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\ThenViewHelper
$renderChildrenClosure27 = function() use ($renderingContext, $self) {
$output28 = '';

$output28 .= '
										<p>Go to <code>';
$array29 = array (
);
$output28 .= htmlspecialchars($renderingContext->getVariableProvider()->getByPath('flowPathRoot', $array29), ENT_QUOTES);

$output28 .= '</code><br />and run the following lines of code:<br />
											<code>set FLOW_CONTEXT=Development</code><br />
											<code>set FLOW_ROOTPATH=';
$array30 = array (
);
$output28 .= htmlspecialchars($renderingContext->getVariableProvider()->getByPath('flowPathRoot', $array30), ENT_QUOTES);

$output28 .= '</code><br />
											<code>set FLOW_WEBPATH=';
$array31 = array (
);
$output28 .= htmlspecialchars($renderingContext->getVariableProvider()->getByPath('flowPathWeb', $array31), ENT_QUOTES);

$output28 .= '</code><br />
											<code>flow.bat kickstart:package MyCompany.MyPackage</code><br />
											to create a package with a standard controller</p>
									';
return $output28;
};
$arguments26 = array();

$output25 .= '';

$output25 .= '
									';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\ElseViewHelper
$renderChildrenClosure33 = function() use ($renderingContext, $self) {
$output34 = '';

$output34 .= '
										<p>Go to <code>';
$array35 = array (
);
$output34 .= htmlspecialchars($renderingContext->getVariableProvider()->getByPath('flowPathRoot', $array35), ENT_QUOTES);

$output34 .= '</code><br />and run<br /><code>./flow kickstart:package MyCompany.MyPackage</code><br />
											to create a package with a standard controller</p>
									';
return $output34;
};
$arguments32 = array();
$arguments32['if'] = NULL;

$output25 .= '';

$output25 .= '
								';
return $output25;
};
$arguments14 = array();
$arguments14['then'] = NULL;
$arguments14['else'] = NULL;
$arguments14['condition'] = false;
// Rendering Boolean node
// Rendering Array
$array22 = array();
$array23 = array (
);$array22['0'] = $renderingContext->getVariableProvider()->getByPath('isWindows', $array23);

$expression24 = function($context) {return ($context["node0"]);};
$arguments14['condition'] = TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(
					$expression24(
						TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\BooleanNode::gatherContext($renderingContext, $array22)
					),
					$renderingContext
				);
$arguments14['__thenClosure'] = function() use ($renderingContext, $self) {
$output16 = '';

$output16 .= '
										<p>Go to <code>';
$array17 = array (
);
$output16 .= htmlspecialchars($renderingContext->getVariableProvider()->getByPath('flowPathRoot', $array17), ENT_QUOTES);

$output16 .= '</code><br />and run the following lines of code:<br />
											<code>set FLOW_CONTEXT=Development</code><br />
											<code>set FLOW_ROOTPATH=';
$array18 = array (
);
$output16 .= htmlspecialchars($renderingContext->getVariableProvider()->getByPath('flowPathRoot', $array18), ENT_QUOTES);

$output16 .= '</code><br />
											<code>set FLOW_WEBPATH=';
$array19 = array (
);
$output16 .= htmlspecialchars($renderingContext->getVariableProvider()->getByPath('flowPathWeb', $array19), ENT_QUOTES);

$output16 .= '</code><br />
											<code>flow.bat kickstart:package MyCompany.MyPackage</code><br />
											to create a package with a standard controller</p>
									';
return $output16;
};
$arguments14['__elseClosures'][] = function() use ($renderingContext, $self) {
$output20 = '';

$output20 .= '
										<p>Go to <code>';
$array21 = array (
);
$output20 .= htmlspecialchars($renderingContext->getVariableProvider()->getByPath('flowPathRoot', $array21), ENT_QUOTES);

$output20 .= '</code><br />and run<br /><code>./flow kickstart:package MyCompany.MyPackage</code><br />
											to create a package with a standard controller</p>
									';
return $output20;
};

$output0 .= TYPO3Fluid\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments14, $renderChildrenClosure15, $renderingContext);

$output0 .= '
							</li>
							<li>
								<h3>Test your controller</h3>
								';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\IfViewHelper
$renderChildrenClosure37 = function() use ($renderingContext, $self) {
$output46 = '';

$output46 .= '
									';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\ThenViewHelper
$renderChildrenClosure48 = function() use ($renderingContext, $self) {
$output49 = '';

$output49 .= '
										<p>Click on ';
// Rendering ViewHelper Neos\FluidAdaptor\ViewHelpers\Link\ActionViewHelper
$renderChildrenClosure51 = function() use ($renderingContext, $self) {
return 'this link';
};
$arguments50 = array();
$arguments50['additionalAttributes'] = NULL;
$arguments50['data'] = NULL;
$arguments50['action'] = NULL;
$arguments50['arguments'] = array (
);
$arguments50['controller'] = NULL;
$arguments50['package'] = NULL;
$arguments50['subpackage'] = NULL;
$arguments50['section'] = '';
$arguments50['format'] = '';
$arguments50['additionalParams'] = array (
);
$arguments50['addQueryString'] = false;
$arguments50['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments50['useParentRequest'] = false;
$arguments50['absolute'] = true;
$arguments50['useMainRequest'] = false;
$arguments50['class'] = NULL;
$arguments50['dir'] = NULL;
$arguments50['id'] = NULL;
$arguments50['lang'] = NULL;
$arguments50['style'] = NULL;
$arguments50['title'] = NULL;
$arguments50['accesskey'] = NULL;
$arguments50['tabindex'] = NULL;
$arguments50['onclick'] = NULL;
$arguments50['name'] = NULL;
$arguments50['rel'] = NULL;
$arguments50['rev'] = NULL;
$arguments50['target'] = NULL;
$arguments50['action'] = 'index';
$arguments50['package'] = 'MyCompany.MyPackage';

$output49 .= Neos\FluidAdaptor\ViewHelpers\Link\ActionViewHelper::renderStatic($arguments50, $renderChildrenClosure51, $renderingContext);

$output49 .= ' to trigger your new package</p>
									';
return $output49;
};
$arguments47 = array();

$output46 .= '';

$output46 .= '
									';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\ElseViewHelper
$renderChildrenClosure53 = function() use ($renderingContext, $self) {
$output54 = '';

$output54 .= '
										<p><em>"MyCompany.MyPackage" has either not yet been created or not activated. Follow step 1 and <a href="javascript:window.location.reload()">reload</a> this page.</em></p>
										<p><em>If you named your package "SomethingElse" visit ';
$array55 = array (
);
$output54 .= htmlspecialchars($renderingContext->getVariableProvider()->getByPath('baseUri', $array55), ENT_QUOTES);

$output54 .= 'SomethingElse/</em></p>
									';
return $output54;
};
$arguments52 = array();
$arguments52['if'] = NULL;

$output46 .= '';

$output46 .= '
								';
return $output46;
};
$arguments36 = array();
$arguments36['then'] = NULL;
$arguments36['else'] = NULL;
$arguments36['condition'] = false;
// Rendering Boolean node
// Rendering Array
$array43 = array();
$array44 = array (
);$array43['0'] = $renderingContext->getVariableProvider()->getByPath('isMyPackageActive', $array44);

$expression45 = function($context) {return ($context["node0"]);};
$arguments36['condition'] = TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(
					$expression45(
						TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\BooleanNode::gatherContext($renderingContext, $array43)
					),
					$renderingContext
				);
$arguments36['__thenClosure'] = function() use ($renderingContext, $self) {
$output38 = '';

$output38 .= '
										<p>Click on ';
// Rendering ViewHelper Neos\FluidAdaptor\ViewHelpers\Link\ActionViewHelper
$renderChildrenClosure40 = function() use ($renderingContext, $self) {
return 'this link';
};
$arguments39 = array();
$arguments39['additionalAttributes'] = NULL;
$arguments39['data'] = NULL;
$arguments39['action'] = NULL;
$arguments39['arguments'] = array (
);
$arguments39['controller'] = NULL;
$arguments39['package'] = NULL;
$arguments39['subpackage'] = NULL;
$arguments39['section'] = '';
$arguments39['format'] = '';
$arguments39['additionalParams'] = array (
);
$arguments39['addQueryString'] = false;
$arguments39['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments39['useParentRequest'] = false;
$arguments39['absolute'] = true;
$arguments39['useMainRequest'] = false;
$arguments39['class'] = NULL;
$arguments39['dir'] = NULL;
$arguments39['id'] = NULL;
$arguments39['lang'] = NULL;
$arguments39['style'] = NULL;
$arguments39['title'] = NULL;
$arguments39['accesskey'] = NULL;
$arguments39['tabindex'] = NULL;
$arguments39['onclick'] = NULL;
$arguments39['name'] = NULL;
$arguments39['rel'] = NULL;
$arguments39['rev'] = NULL;
$arguments39['target'] = NULL;
$arguments39['action'] = 'index';
$arguments39['package'] = 'MyCompany.MyPackage';

$output38 .= Neos\FluidAdaptor\ViewHelpers\Link\ActionViewHelper::renderStatic($arguments39, $renderChildrenClosure40, $renderingContext);

$output38 .= ' to trigger your new package</p>
									';
return $output38;
};
$arguments36['__elseClosures'][] = function() use ($renderingContext, $self) {
$output41 = '';

$output41 .= '
										<p><em>"MyCompany.MyPackage" has either not yet been created or not activated. Follow step 1 and <a href="javascript:window.location.reload()">reload</a> this page.</em></p>
										<p><em>If you named your package "SomethingElse" visit ';
$array42 = array (
);
$output41 .= htmlspecialchars($renderingContext->getVariableProvider()->getByPath('baseUri', $array42), ENT_QUOTES);

$output41 .= 'SomethingElse/</em></p>
									';
return $output41;
};

$output0 .= TYPO3Fluid\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments36, $renderChildrenClosure37, $renderingContext);

$output0 .= '
							</li>
							<li>
								<h3>Read the tutorial</h3>
								<p>Switch over to the <a href="http://flowframework.readthedocs.io/en/latest/Quickstart/" target="flow">Quickstart Tutorial</a> to get the a first overview.</p>
							</li>
							<li>
								<h3>Deactivate the Welcome package (optional)</h3>
								<p>Deactivate the Welcome package with<br />
								';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\IfViewHelper
$renderChildrenClosure57 = function() use ($renderingContext, $self) {
$output61 = '';

$output61 .= '
									';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\ThenViewHelper
$renderChildrenClosure63 = function() use ($renderingContext, $self) {
return '
										<code>flow.bat package:deactivate Neos.Welcome</code>
									';
};
$arguments62 = array();

$output61 .= '';

$output61 .= '
									';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\ElseViewHelper
$renderChildrenClosure65 = function() use ($renderingContext, $self) {
return '
										<code>./flow package:deactivate Neos.Welcome</code>
									';
};
$arguments64 = array();
$arguments64['if'] = NULL;

$output61 .= '';

$output61 .= '
								';
return $output61;
};
$arguments56 = array();
$arguments56['then'] = NULL;
$arguments56['else'] = NULL;
$arguments56['condition'] = false;
// Rendering Boolean node
// Rendering Array
$array58 = array();
$array59 = array (
);$array58['0'] = $renderingContext->getVariableProvider()->getByPath('isWindows', $array59);

$expression60 = function($context) {return ($context["node0"]);};
$arguments56['condition'] = TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(
					$expression60(
						TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\BooleanNode::gatherContext($renderingContext, $array58)
					),
					$renderingContext
				);
$arguments56['__thenClosure'] = function() use ($renderingContext, $self) {
return '
										<code>flow.bat package:deactivate Neos.Welcome</code>
									';
};
$arguments56['__elseClosures'][] = function() use ($renderingContext, $self) {
return '
										<code>./flow package:deactivate Neos.Welcome</code>
									';
};

$output0 .= TYPO3Fluid\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments56, $renderChildrenClosure57, $renderingContext);

$output0 .= '
								<p>Afterwards make sure to <strong>remove the &quot;Welcome&quot; SubRoute definition</strong> from the global routes in <em>Configuration/Routes.yaml</em>.</p>
							</li>
						</ol>
					</div>
				</div>
				<h2 class="invisible">More information</h2>
				<div class="sidebar">
					<h3>Join the community</h3>
					<ul>
						<li><a href="https://www.neos.io/contribute.html" target="flow">Contribute to Flow and Neos</a></li>
					</ul>
					<h3>Read the documentation</h3>
					<ul>
						<li><a href="http://flowframework.readthedocs.io/" target="flow">Documentation</a></li>
						<li><a href="https://www.neos.io/docs-and-support/api-documentation.html" target="flow">Flow API</a></li>
						<li><a href="http://flowframework.readthedocs.io/en/latest/TheDefinitiveGuide/PartV/CodingGuideLines/" target="flow">Coding guidelines</a></li>
						<li><a href="https://jira.neos.io/browse/FLOW" target="flow">Known issues</a></li>
					</ul>
					<h3>Get involved</h3>
					<ul>
						<li><a href="https://discuss.neos.io/" target="flow">Start a thread in our forum</a></li>
						<li><a href="http://slack.neos.io/" target="flow">Join us on Slack</a></li>
						<li><a href="https://jira.neos.io/secure/CreateIssue!default.jspa" target="flow">Report a bug</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="tab">
			<h2 class="title title-about">About</h2>
			<div class="content">
				<div class="main">
					<div class="spacer">
						<h3 class="first">About Flow</h3>
						<p>Flow is an offspring from the development of <a href="https://www.neos.io">Neos</a> and
						can be used independently as an application framework. It is licensed under the terms of the MIT
						license.</p>
						<h3>Credits</h3>
						<p>Many people have contributed to Flow with ideas, design, testing, money, code and espresso. A big thank you goes to the
						community and the members of the TYPO3 Association who made the development of Flow possible in the first years.</p>
						<p>The main part of Flow was designed and developed by Robert Lemke. The persistence integration was developed and major
						contributions to Flow were made by Karsten Dambekalns. Andreas Förthner designed and developed the Security Framework while
						Bastian Waidelich created the initial implementation of Flow\'s routing mechanism. Sebastian Kurfürst and Bastian Waidelich
						designed and implemented the Fluid templating engine.</p>
						<p>Further code contributions were made by the Neos team and others: Adrian Föder, Alexander Stehlik, Andreas Wolf, Aske Ertmann,
						Bernhard Fischer, Christian Jul Jensen, Christian Kuhn, Christian Müller, Christopher Hlubek, Daniel Brün, Felix Oertel, Ferdinand Kuhl,
						Irene Höppner, Jochen Rau, Johannes Künsebeck, Julian Kleinhans, Julian Wachholz, Karol Gusak, Lars Peipmann, Lienhart Woitok, Marco Huber,
						Martin Brüggemann, Martin Ficzel, Michael Klapper, Michael Sauter, Nils Jeisecke, Oliver Hader, Rens Admiraal, Sascha Egerer,
						Stefan Neufeind, Stephan Schuler, Thomas Hempel, Thomas Layh, Tim Eilers, Tobias Liebig, Tolleiv Nietsch and Zach Davis.</p>
						<p>The initial design of the AOP framework and the IoC container were inspired by the viFramework developed by Florian Grandel who
						also pointed Robert to the Spring Framework which was a great source for inspiration. Further frameworks and projects which influenced
						the design of Flow are AspectJ, NanoContainer, Ruby on Rails, Symfony, QT and surely more.</p>
						<p>The overall design and concepts would be way less mature and elegant if experts like Martin Fowler, Eric Evans, Jimmy Nilsson,
						Kent Beck or Paul Duvall wouldn\'t have shared their insights in books and talks.</p>
						<p>Many more contributions have been made by various members of the TYPO3 and PHP community - thanks to all of you!</p>
						<h3>Installed Packages</h3>
						<ul class="packages">
						';
// Rendering ViewHelper TYPO3Fluid\Fluid\ViewHelpers\ForViewHelper
$renderChildrenClosure67 = function() use ($renderingContext, $self) {
$output69 = '';

$output69 .= '
							<li class="package">
								<h4><span class="package-key">';
$array70 = array (
);
$output69 .= htmlspecialchars($renderingContext->getVariableProvider()->getByPath('package.packageKey', $array70), ENT_QUOTES);

$output69 .= '</span> <small><span class="package-version">';
$array71 = array (
);
$output69 .= htmlspecialchars($renderingContext->getVariableProvider()->getByPath('package.packageMetaData.version', $array71), ENT_QUOTES);

$output69 .= '</span></small></h4>
								<p>';
$array72 = array (
);
$output69 .= htmlspecialchars($renderingContext->getVariableProvider()->getByPath('package.packageMetaData.description', $array72), ENT_QUOTES);

$output69 .= '</p>
							</li>
						';
return $output69;
};
$arguments66 = array();
$arguments66['each'] = NULL;
$arguments66['as'] = NULL;
$arguments66['key'] = NULL;
$arguments66['reverse'] = false;
$arguments66['iteration'] = NULL;
$array68 = array (
);$arguments66['each'] = $renderingContext->getVariableProvider()->getByPath('activePackages', $array68);
$arguments66['as'] = 'package';

$output0 .= TYPO3Fluid\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments66, $renderChildrenClosure67, $renderingContext);

$output0 .= '
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>
';

return $output0;
}


}
#0             26910     