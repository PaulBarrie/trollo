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

/* task/new_task.html.twig */
class __TwigTemplate_e4bbaa9a1dc2873ca1391578637dba56455368aeb919b23652f637b8e48f8882 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "../base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "task/new_task.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "task/new_task.html.twig"));

        // line 3
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme((isset($context["formTask"]) || array_key_exists("formTask", $context) ? $context["formTask"] : (function () { throw new RuntimeError('Variable "formTask" does not exist.', 3, $this->source); })()), [0 => "bootstrap_4_layout.html.twig"], true);
        // line 1
        $this->parent = $this->loadTemplate("../base.html.twig", "task/new_task.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "

    <h1>Ajouter une nouvelle tâche </h1>

    ";
        // line 10
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formTask"]) || array_key_exists("formTask", $context) ? $context["formTask"] : (function () { throw new RuntimeError('Variable "formTask" does not exist.', 10, $this->source); })()), 'form_start');
        echo "

    ";
        // line 12
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formTask"]) || array_key_exists("formTask", $context) ? $context["formTask"] : (function () { throw new RuntimeError('Variable "formTask" does not exist.', 12, $this->source); })()), "title", [], "any", false, false, false, 12), 'row', ["label" => "Titre", "attr" => ["placeholder" => "Nom de votre tâche"]]);
        // line 15
        echo "

    ";
        // line 17
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formTask"]) || array_key_exists("formTask", $context) ? $context["formTask"] : (function () { throw new RuntimeError('Variable "formTask" does not exist.', 17, $this->source); })()), "description", [], "any", false, false, false, 17), 'row', ["label" => "Description", "attr" => ["placeholder" => "Décrivez votre tâche"]]);
        // line 20
        echo "

    ";
        // line 22
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formTask"]) || array_key_exists("formTask", $context) ? $context["formTask"] : (function () { throw new RuntimeError('Variable "formTask" does not exist.', 22, $this->source); })()), "state", [], "any", false, false, false, 22), 'row', ["label" => "Avancement"]);
        // line 24
        echo "
    ";
        // line 25
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formTask"]) || array_key_exists("formTask", $context) ? $context["formTask"] : (function () { throw new RuntimeError('Variable "formTask" does not exist.', 25, $this->source); })()), "deadline", [], "any", false, false, false, 25), 'row', ["label" => "Date de rendue"]);
        // line 27
        echo "
    ";
        // line 28
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["formTask"]) || array_key_exists("formTask", $context) ? $context["formTask"] : (function () { throw new RuntimeError('Variable "formTask" does not exist.', 28, $this->source); })()), 'widget');
        echo "
    <button type=\"submit\" class=\"btn btn-success\"> Valider </button>
    ";
        // line 30
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formTask"]) || array_key_exists("formTask", $context) ? $context["formTask"] : (function () { throw new RuntimeError('Variable "formTask" does not exist.', 30, $this->source); })()), 'form_end');
        echo "

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "task/new_task.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 30,  104 => 28,  101 => 27,  99 => 25,  96 => 24,  94 => 22,  90 => 20,  88 => 17,  84 => 15,  82 => 12,  77 => 10,  71 => 6,  61 => 5,  50 => 1,  48 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '../base.html.twig'%}

{% form_theme formTask 'bootstrap_4_layout.html.twig'  %}

{% block body%}


    <h1>Ajouter une nouvelle tâche </h1>

    {{ form_start(formTask)}}

    {{form_row(formTask.title,
        {'label':'Titre',
            'attr':{'placeholder':'Nom de votre tâche'}})
    }}

    {{form_row(formTask.description,
        {'label':'Description',
            'attr':{'placeholder':'Décrivez votre tâche'}})
    }}

    {{form_row(formTask.state,
        {'label': 'Avancement'})
    }}
    {{form_row(formTask.deadline,
        {'label': 'Date de rendue'})
    }}
    {{form_widget(formTask)}}
    <button type=\"submit\" class=\"btn btn-success\"> Valider </button>
    {{form_end(formTask)}}

{% endblock %}", "task/new_task.html.twig", "/home/paulb/Documents/Projects/Trollo/templates/task/new_task.html.twig");
    }
}
