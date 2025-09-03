namespace sistemaModeradorZigZag
{
    partial class frmMenu
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.menuStrip1 = new System.Windows.Forms.MenuStrip();
            this.painelGeralToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.costureiroToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.entregadoresToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.verificarToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.costureirosToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.entregadoresToolStripMenuItem1 = new System.Windows.Forms.ToolStripMenuItem();
            this.sairToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.sobreToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.toolStripMenuItem2 = new System.Windows.Forms.ToolStripMenuItem();
            this.toolStripMenuItem3 = new System.Windows.Forms.ToolStripMenuItem();
            this.toolStripMenuItem4 = new System.Windows.Forms.ToolStripMenuItem();
            this.menuStrip1.SuspendLayout();
            this.SuspendLayout();
            // 
            // menuStrip1
            // 
            this.menuStrip1.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.painelGeralToolStripMenuItem,
            this.verificarToolStripMenuItem,
            this.sobreToolStripMenuItem,
            this.sairToolStripMenuItem,
            this.toolStripMenuItem2,
            this.toolStripMenuItem3,
            this.toolStripMenuItem4});
            this.menuStrip1.Location = new System.Drawing.Point(0, 0);
            this.menuStrip1.Name = "menuStrip1";
            this.menuStrip1.Size = new System.Drawing.Size(283, 24);
            this.menuStrip1.TabIndex = 0;
            this.menuStrip1.Text = "Sobre";
            // 
            // painelGeralToolStripMenuItem
            // 
            this.painelGeralToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.costureiroToolStripMenuItem,
            this.entregadoresToolStripMenuItem});
            this.painelGeralToolStripMenuItem.Name = "painelGeralToolStripMenuItem";
            this.painelGeralToolStripMenuItem.Size = new System.Drawing.Size(81, 20);
            this.painelGeralToolStripMenuItem.Text = "Painel Geral";
            // 
            // costureiroToolStripMenuItem
            // 
            this.costureiroToolStripMenuItem.Name = "costureiroToolStripMenuItem";
            this.costureiroToolStripMenuItem.Size = new System.Drawing.Size(143, 22);
            this.costureiroToolStripMenuItem.Text = "Costureiros";
            this.costureiroToolStripMenuItem.Click += new System.EventHandler(this.costureiroToolStripMenuItem_Click);
            // 
            // entregadoresToolStripMenuItem
            // 
            this.entregadoresToolStripMenuItem.Name = "entregadoresToolStripMenuItem";
            this.entregadoresToolStripMenuItem.Size = new System.Drawing.Size(143, 22);
            this.entregadoresToolStripMenuItem.Text = "Entregadores";
            this.entregadoresToolStripMenuItem.Click += new System.EventHandler(this.entregadoresToolStripMenuItem_Click);
            // 
            // verificarToolStripMenuItem
            // 
            this.verificarToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.costureirosToolStripMenuItem,
            this.entregadoresToolStripMenuItem1});
            this.verificarToolStripMenuItem.Name = "verificarToolStripMenuItem";
            this.verificarToolStripMenuItem.Size = new System.Drawing.Size(61, 20);
            this.verificarToolStripMenuItem.Text = "Verificar";
            // 
            // costureirosToolStripMenuItem
            // 
            this.costureirosToolStripMenuItem.Name = "costureirosToolStripMenuItem";
            this.costureirosToolStripMenuItem.Size = new System.Drawing.Size(180, 22);
            this.costureirosToolStripMenuItem.Text = "Costureiros";
            this.costureirosToolStripMenuItem.Click += new System.EventHandler(this.costureirosToolStripMenuItem_Click);
            // 
            // entregadoresToolStripMenuItem1
            // 
            this.entregadoresToolStripMenuItem1.Name = "entregadoresToolStripMenuItem1";
            this.entregadoresToolStripMenuItem1.Size = new System.Drawing.Size(180, 22);
            this.entregadoresToolStripMenuItem1.Text = "Entregadores";
            this.entregadoresToolStripMenuItem1.Click += new System.EventHandler(this.entregadoresToolStripMenuItem1_Click);
            // 
            // sairToolStripMenuItem
            // 
            this.sairToolStripMenuItem.Name = "sairToolStripMenuItem";
            this.sairToolStripMenuItem.Size = new System.Drawing.Size(38, 20);
            this.sairToolStripMenuItem.Text = "Sair";
            this.sairToolStripMenuItem.Click += new System.EventHandler(this.sairToolStripMenuItem_Click);
            // 
            // sobreToolStripMenuItem
            // 
            this.sobreToolStripMenuItem.Name = "sobreToolStripMenuItem";
            this.sobreToolStripMenuItem.Size = new System.Drawing.Size(49, 20);
            this.sobreToolStripMenuItem.Text = "Sobre";
            this.sobreToolStripMenuItem.Click += new System.EventHandler(this.sobreToolStripMenuItem_Click);
            // 
            // toolStripMenuItem2
            // 
            this.toolStripMenuItem2.Name = "toolStripMenuItem2";
            this.toolStripMenuItem2.Size = new System.Drawing.Size(12, 20);
            // 
            // toolStripMenuItem3
            // 
            this.toolStripMenuItem3.Name = "toolStripMenuItem3";
            this.toolStripMenuItem3.Size = new System.Drawing.Size(12, 20);
            // 
            // toolStripMenuItem4
            // 
            this.toolStripMenuItem4.Name = "toolStripMenuItem4";
            this.toolStripMenuItem4.Size = new System.Drawing.Size(12, 20);
            // 
            // frmMenu
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(283, 52);
            this.Controls.Add(this.menuStrip1);
            this.MainMenuStrip = this.menuStrip1;
            this.Name = "frmMenu";
            this.Text = "Menu";
            this.menuStrip1.ResumeLayout(false);
            this.menuStrip1.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.MenuStrip menuStrip1;
        private System.Windows.Forms.ToolStripMenuItem painelGeralToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem costureiroToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem entregadoresToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem verificarToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem costureirosToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem entregadoresToolStripMenuItem1;
        private System.Windows.Forms.ToolStripMenuItem sairToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem sobreToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem toolStripMenuItem2;
        private System.Windows.Forms.ToolStripMenuItem toolStripMenuItem3;
        private System.Windows.Forms.ToolStripMenuItem toolStripMenuItem4;
    }
}

