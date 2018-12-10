<?php

/* library/index.html.twig */
class __TwigTemplate_f7448fa7be02f37ed1294d6ea64d4de82a1e9d66f68ea7afab921e4edea488f4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "library/index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "library/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "library/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "
    <div class=\"row\">
        <div class=\"col-9\">
            <div id=\"middle_card\" class=\"card border-dark mb-3\">
                <div class=\"card-header\">
                    <iframe src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("pdf/test.pdf"), "html", null, true);
        echo "\" style=\"width: 100%;height: 500px;\" ></iframe>
                </div>
                <div class=\"card-body text-dark\">
                    <h5 class=\"card-title\">Direction de la recherche, des études, de l'évaluation et des statistiques.</h5>
                    <p class=\"card-text\">Ce dossier décrit la place des organismes privés d’assurances dans la couverture
                                         maladie en Europe, à travers l’exemple de six pays : la France, l’Allemagne,
                                         les Pays-Bas, la Suisse, l’Espagne et le Royaume-Uni.Au sein de ces pays existe
                                         une couverture maladie de base et obligatoire instaurée par les pouvoirs publics.
                                         Toutefois, en Suisse, aux Pays-Bas et dans une moindre mesure enAllemagne,
                                         la gestion de cette couverture de base est confiée aux assureurs privés,
                                         mis en concurrence. Dans l’ensemble des pays étudiés, des organismes privés
                                         proposent aussi en sus une offre d’assurance maladie facultative qui vient
                                         améliorer la couverture de base.</p>
                </div>
            </div> 
        </div>
        <div class=\"col\">
            <nav class=\"navbar navbar-light bg-light\">
                <form class=\"form-inline\">
                    <button id=\"btn_co\" class=\"btn btn-outline-success\" type=\"button\" url=\"";
        // line 30
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_login");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("general.navbar.connexion", array(), "app"), "html", null, true);
        echo "</button>
                    <button id=\"btn_in\" class=\"btn btn-sm btn-outline-secondary\" type=\"button\" url=\"";
        // line 31
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_registration_register");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("general.navbar.register", array(), "app"), "html", null, true);
        echo "</button>
                </form>
            </nav>
        </div>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 39
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 40
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "library/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 40,  104 => 39,  85 => 31,  79 => 30,  57 => 11,  50 => 6,  41 => 5,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% trans_default_domain 'app' %}

{% block body %}

    <div class=\"row\">
        <div class=\"col-9\">
            <div id=\"middle_card\" class=\"card border-dark mb-3\">
                <div class=\"card-header\">
                    <iframe src=\"{{ asset('pdf/test.pdf') }}\" style=\"width: 100%;height: 500px;\" ></iframe>
                </div>
                <div class=\"card-body text-dark\">
                    <h5 class=\"card-title\">Direction de la recherche, des études, de l'évaluation et des statistiques.</h5>
                    <p class=\"card-text\">Ce dossier décrit la place des organismes privés d’assurances dans la couverture
                                         maladie en Europe, à travers l’exemple de six pays : la France, l’Allemagne,
                                         les Pays-Bas, la Suisse, l’Espagne et le Royaume-Uni.Au sein de ces pays existe
                                         une couverture maladie de base et obligatoire instaurée par les pouvoirs publics.
                                         Toutefois, en Suisse, aux Pays-Bas et dans une moindre mesure enAllemagne,
                                         la gestion de cette couverture de base est confiée aux assureurs privés,
                                         mis en concurrence. Dans l’ensemble des pays étudiés, des organismes privés
                                         proposent aussi en sus une offre d’assurance maladie facultative qui vient
                                         améliorer la couverture de base.</p>
                </div>
            </div> 
        </div>
        <div class=\"col\">
            <nav class=\"navbar navbar-light bg-light\">
                <form class=\"form-inline\">
                    <button id=\"btn_co\" class=\"btn btn-outline-success\" type=\"button\" url=\"{{ path('fos_user_security_login')}}\">{{ 'general.navbar.connexion'|trans }}</button>
                    <button id=\"btn_in\" class=\"btn btn-sm btn-outline-secondary\" type=\"button\" url=\"{{ path('fos_user_registration_register')}}\">{{ 'general.navbar.register'|trans }}</button>
                </form>
            </nav>
        </div>
    </div>

{% endblock %}

{% block stylesheets %}

{% endblock %}
", "library/index.html.twig", "/home/ubuntu/workspace/app/Resources/views/library/index.html.twig");
    }
}
