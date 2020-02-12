<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* task/_tasks.html.twig */
class __TwigTemplate_2732820b8e96cbf47fcbd71d4869fde8bddd5a661e6be4de36e716ccf0ad060a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "task/_tasks.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "task/_tasks.html.twig"));

        // line 1
        echo "<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-sm\">
            <h5> ";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["d"]) || array_key_exists("d", $context) ? $context["d"] : (function () { throw new RuntimeError('Variable "d" does not exist.', 4, $this->source); })()), "project_name", [], "any", false, false, false, 4), "html", null, true);
        echo " </h5>
            ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["d"]) || array_key_exists("d", $context) ? $context["d"] : (function () { throw new RuntimeError('Variable "d" does not exist.', 5, $this->source); })()), "task", [], "any", false, false, false, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 6
            echo "                <div class=\"card mb-2\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">
                            <h5><b> ";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "title", [], "any", false, false, false, 9), "html", null, true);
            echo " </b> </h5>
                            <h6> Avancement: ";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "state", [], "any", false, false, false, 10), "html", null, true);
            echo "</h6>
                            <h6> Du pour le : ";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "deadline", [], "any", false, false, false, 11), "html", null, true);
            echo " </h6>
                            <a class=\"navbar-toggler-icon\" href=\"/task/delete/";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", [], "any", false, false, false, 12), "html", null, true);
            echo "\"> del </a>
                            <a class=\"navbar-toggler-icon\" href=\"/task/edit/";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", [], "any", false, false, false, 13), "html", null, true);
            echo "\"> edit </a>

                        </h5>
                    </div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "        </div>

    </div>
</div>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "task/_tasks.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 19,  77 => 13,  73 => 12,  69 => 11,  65 => 10,  61 => 9,  56 => 6,  52 => 5,  48 => 4,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-sm\">
            <h5> {{ d.project_name }} </h5>
            {% for t in d.task %}
                <div class=\"card mb-2\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">
                            <h5><b> {{ t.title }} </b> </h5>
                            <h6> Avancement: {{ t.state}}</h6>
                            <h6> Du pour le : {{t.deadline}} </h6>
                            <a class=\"navbar-toggler-icon\" href=\"/task/delete/{{t.id}}\"> del </a>
                            <a class=\"navbar-toggler-icon\" href=\"/task/edit/{{t.id}}\"> edit </a>

                        </h5>
                    </div>
                </div>
            {% endfor %}
        </div>

    </div>
</div>", "task/_tasks.html.twig", "/home/paulb/Documents/Projects/Trollo/templates/task/_tasks.html.twig");
    }
}
