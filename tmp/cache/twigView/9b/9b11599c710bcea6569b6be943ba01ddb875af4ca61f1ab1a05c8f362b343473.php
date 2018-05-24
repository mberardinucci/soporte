<?php

/* C:\xampp\htdocs\soporte\vendor\cakephp\bake\src\Template\Bake\Template\edit.twig */
class __TwigTemplate_64862697173c3dc6a085df71a71034b4444c92fdfe13edeca6ac527ab5f21550 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_8deab3689324b6cf5ecb39b4ea50ccbf6f6d08d4336c3afa9b95d5dc014af533 = $this->env->getExtension("WyriHaximus\\TwigView\\Lib\\Twig\\Extension\\Profiler");
        $__internal_8deab3689324b6cf5ecb39b4ea50ccbf6f6d08d4336c3afa9b95d5dc014af533->enter($__internal_8deab3689324b6cf5ecb39b4ea50ccbf6f6d08d4336c3afa9b95d5dc014af533_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "C:\\xampp\\htdocs\\soporte\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Template\\edit.twig"));

        // line 16
        echo "<?php
/**
 * @var \\";
        // line 18
        echo twig_escape_filter($this->env, ($context["namespace"] ?? null), "html", null, true);
        echo "\\View\\AppView \$this
 * @var \\";
        // line 19
        echo twig_escape_filter($this->env, ($context["entityClass"] ?? null), "html", null, true);
        echo " \$";
        echo twig_escape_filter($this->env, ($context["singularVar"] ?? null), "html", null, true);
        echo "
 */
?>
";
        // line 22
echo $context['_view']->element("form",array(),array());
        
        $__internal_8deab3689324b6cf5ecb39b4ea50ccbf6f6d08d4336c3afa9b95d5dc014af533->leave($__internal_8deab3689324b6cf5ecb39b4ea50ccbf6f6d08d4336c3afa9b95d5dc014af533_prof);

    }

    public function getTemplateName()
    {
        return "C:\\xampp\\htdocs\\soporte\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Template\\edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 22,  30 => 19,  26 => 18,  22 => 16,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
#}
<?php
/**
 * @var \\{{ namespace }}\\View\\AppView \$this
 * @var \\{{ entityClass }} \${{ singularVar }}
 */
?>
{% element 'form' %}
", "C:\\xampp\\htdocs\\soporte\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Template\\edit.twig", "");
    }
}
