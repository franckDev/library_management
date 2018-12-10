<?php

/* library/index.html.twig */
class __TwigTemplate_f40d5541c526f7052e1e58a09915e1ef6b9ecedbff4fa9b46b3d34702eafc064 extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
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
    }

    // line 39
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 40
        echo "
";
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
        return array (  83 => 40,  80 => 39,  67 => 31,  61 => 30,  39 => 11,  32 => 6,  29 => 5,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "library/index.html.twig", "/home/ubuntu/workspace/app/Resources/views/library/index.html.twig");
    }
}
