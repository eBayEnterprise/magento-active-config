<?php
class TrueAction_ActiveConfig_Test_Model_Observer_ConfigTest extends EcomDev_PHPUnit_Test_Case_Config
{
	public function testProcessConfigImportsEventConfig()
	{
		$this->assertEventObserverDefined(
			'global',
			'adminhtml_init_system_config',
			'TrueAction_ActiveConfig_Model_Observer',
			'processConfigImports',
			'config_imports_observer'
		);
	}
}