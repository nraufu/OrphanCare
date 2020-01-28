<?php
include("admin/include/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $pagetitle="Projects";
    include('./include/libraries.php');
    ?>
</head>
<body>
    <!--navbar -->
    <?php 
    $project="active";
    include('./include/navbar.php') ?>
   <!--end of navbar -->

<div class="container">
        <!--banner -->
        <?php 
        $icon="fas fa-clipboard-list";
        $title="Projects";
        $tdescription="Making impacts on the world";

        include ('./include/banner.php');
        ?>
        <!-- end of banner -->
        
    <!--new section1-->
    <div class="row my-5">
       <div class="col">
           <p>In our project area number of Orphan, Semi Orphan and Street Children are found. The problem of orphan / street children is acute due to urbanization and industrialization.  Due to the deaths of HIV/AIDS affected persons, Re-marriage of deserted / widowed / divorce women, absence of love and security in the families, Family disputes, Unwanted pregnancy of Trafficking / Sexually exploited girls; these orphan and street children are left without care and support. These children are involved in rag picking; pick pocketing and participating in anti social, criminal activities. Therefore, we envisage mainstreaming these children in the national building by providing care, support and protection in our orphan care</p>
       </div> 
    </div>
    <!--end of section1-->

    <!--projects Section-->
    <div class="row">
        <div class="col">
                <div class="media border rounded p-2 my-2">
                        <img src="./images/project-icon.png" class="align-self-center mr-3 my-3" alt="project images">
                        <div class="media-body">
                          <h5 class="mt-0"><a href="#">Early childhood development</a></h5>
                          Early childhood development, or ECD, refers to the physical, cognitive, linguistic, and socio-emotional development of a child from pregnancy through the first years of life. The right interventions at the right time can boost a child’s development and provide a fair start in life for every child. For babies born into deprivation, intervening early, when the brain is rapidly developing, can reverse harm and help build resilience.
                        </div>
                </div>
                <div class="media border rounded p-2 my-2">
                        <img src="./images/project-icon.png" class="align-self-center mr-3 my-3" alt="project images">
                        <div class="media-body">
                          <h5 class="mt-0"><a href="#">Youth empowerment </a></h5>
                          With fund from the UNFPA and support from the government of Malawi we are working in partnership with Sumaili youth organization and Zimbiri youth organization to empower the youth from various communities and schools by offering motivational talks which include bringing some of the youth who are successful from various part of the country. These youth include singers who encourage those that have an outstanding talent in writing and composing songs, and some are young politicians and others from different professionalism.
                        </div>
                </div>
                <div class="media border rounded p-2 my-2">
                        <img src="./images/project-icon.png" class="align-self-center mr-3 my-3" alt="project images">
                        <div class="media-body">
                          <h5 class="mt-0"><a href="#">Creating child-friendly communities</a></h5>
                          With the high levels of poverty in Malawi the availability of some important resources to the children which come from the poverty hit families which can’t afford to have access to most valuable resources, therefore resulting to child poverty.
                        </div>
                </div>
                <div class="media border rounded p-2 my-2">
                        <img src="./images/project-icon.png" class="align-self-center mr-3 my-3" alt="project images">
                        <div class="media-body">
                          <h5 class="mt-0"><a href="#">Back  to school program</a></h5>
                          With the rising of children who were dropping out of school in the country, some organisations like the firelight foundation from the US initiated a program called back to school and partnered  the Namwera Aids Coordinating Committee and alleluya Orphan care to work on the project which is aimed at providing school materials to the children who dropped out of school due to lack of school materials such as fees, and  other important resources that are necessary for child education such that they can finish there education and persue their dreams. 
                        </div>
                </div>
        </div>
    </div>
    
    <!--end of projects Section-->
</div>
  
    <!--footer -->
    <?php include('./include/footer.php'); ?>
     <!--end of footer -->

<script src="./js/jquery.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>