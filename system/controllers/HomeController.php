<?php
namespace DEV\Controllers;

use Rain\Tpl;

class HomeController
{
	private $tpl;

	function __construct()
	{
		$config = array(
			'base_url' => __DIR_PRINCIPAL__,
			'tpl_dir' => $_SERVER['DOCUMENT_ROOT'].__DIR_PRINCIPAL__."/system/views/",
			'cache_dir' => $_SERVER['DOCUMENT_ROOT'].__DIR_PRINCIPAL__.'/cache/',
			'tpl_ext' => 'php',
			'debug' => true
		);

		Tpl::configure($config);

		$this->tpl = new Tpl;

		//$this->setTpl("header");
		
	}

	function __destruct()
	{
		$this->tpl->draw("footer", false);
		$this->setTpl("footer");
	}

	public function setTpl($template, $data=array(), $returnHtml = false)
	{
		$this->setData($data);

		return $this->tpl->draw($template, $returnHtml);
	}

	public function setData($data= array())
	{
		foreach ($data as $key => $value) {
			$this->tpl->assign($key, $value);
		}
	}

	public function login()
	{		
		$this->setTpl("header", array('page_title' => 'Pagina de Login'));
		$this->tpl->draw("login", false);		
	}

	public function feed()
	{
		$this->setTpl("header", array('page_title' => 'Seu feed'));
		$this->tpl->draw("feed", false);
	}

	public function feed_usuario($request, $response, $args)
	{
		$nome = $args['usuario'];
		$this->setTpl("header", array('page_title' => 'Feed de ' .$nome));
		$this->setTpl("feed_user", array('userName' => $nome));		
	}
}
?>